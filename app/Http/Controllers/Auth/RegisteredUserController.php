<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\PatientProfile;
use App\Models\UserNutritionPlan;
use App\Models\NutritionPlan;
use Carbon\Carbon;

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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->string('role')->toString(),
            'password' => Hash::make($request->password),
        ]);

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
                    if ($foundPlan) break;
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

        Auth::login($user);

        return redirect(route($user->homeRouteName(), absolute: false));
    }
}
