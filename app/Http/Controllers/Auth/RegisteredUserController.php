<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NutritionPlan;
use App\Models\PatientProfile;
use App\Models\User;
use App\Models\UserNutritionPlan;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'in:user,trainer'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->numbers()->symbols()],
            'age' => ['nullable', 'integer', 'min:10', 'max:120'],
            'phone' => ['nullable', 'string', 'max:30'],
            'selected_system' => ['nullable', 'in:diabetes,weight_loss,muscle_building'],
        ]);

        $phone = $request->input('phone');
        if ($phone !== null && $phone !== '') {
            $digits = preg_replace('/\D+/', '', $phone);
            if (strlen($digits) < 10) {
                throw ValidationException::withMessages([
                    'phone' => 'رقم الهاتف يجب ألا يقل عن 10 أرقام.',
                ]);
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->input('phone'),
            'role' => $request->string('role')->toString(),
            'selected_system' => $request->input('selected_system'),
            'password' => Hash::make($request->password),
        ]);

        // If registering a patient (user), persist a basic PatientProfile with date_of_birth derived from provided age (if any)
        if ($user->role === 'user') {
            $age = $request->input('age');
            if ($age) {
                $dob = Carbon::now()->subYears(intval($age))->toDateString();
            } else {
                $dob = null;
            }

            PatientProfile::query()->create([
                'user_id' => $user->id,
                'date_of_birth' => $dob,
            ]);
        }

        // If user provided a selected_system, try to map it to an existing NutritionPlan and assign it as primary
        if ($request->filled('selected_system')) {
            $key = $request->input('selected_system');
            $map = [
                'diabetes' => ['سكري', 'diabetes', 'تغذية مرضى السكري'],
                'weight_loss' => ['خسارة الوزن', 'weight loss', 'إنقاص الوزن'],
                'muscle_building' => ['بناء العضلات', 'muscle', 'تضخيم'],
            ];

            $foundPlan = null;
            if (isset($map[$key])) {
                foreach ($map[$key] as $term) {
                    $foundPlan = NutritionPlan::query()->where('title', 'like', "%{$term}%")->first();
                    if ($foundPlan) {
                        break;
                    }
                }
            }

            if ($foundPlan) {
                UserNutritionPlan::updateOrCreate([
                    'user_id' => $user->id,
                    'nutrition_plan_id' => $foundPlan->id,
                ], [
                    'is_primary' => true,
                    'assigned_at' => now(),
                ]);
            }
        }

        event(new Registered($user));

        // Show systems button after first login so user can pick additional systems if desired
        session()->flash('show_systems_button', true);

        Auth::login($user);

        return redirect(route($user->homeRouteName(), absolute: false));
    }
}
