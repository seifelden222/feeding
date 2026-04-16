<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerStoreUserRequest;
use App\Http\Requests\TrainerUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $managedUsers = User::query()
            ->where('role', 'user')
            ->orderByDesc('created_at')
            ->get();

        return view('trainer.usermanage', [
            'managedUsers' => $managedUsers,
        ]);
    }

    public function store(TrainerStoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'status' => $validated['status'] ?? 'active',
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('trainer.usermanage')
            ->with('status', 'user-created');
    }

    public function update(TrainerUpdateUserRequest $request, User $managed_user): RedirectResponse
    {
        $validated = $request->validated();

        $managedUserData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'status' => $validated['status'] ?? 'active',
            'role' => $validated['role'],
        ];

        if (! empty($validated['password'])) {
            $managedUserData['password'] = Hash::make($validated['password']);
        }

        $managed_user->update($managedUserData);

        return redirect()
            ->route('trainer.usermanage')
            ->with('status', 'user-updated');
    }
}
