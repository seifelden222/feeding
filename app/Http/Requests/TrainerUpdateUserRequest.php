<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class TrainerUpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user()?->isTrainer();
    }

    public function rules(): array
    {
        /** @var User $managedUser */
        $managedUser = $this->route('managed_user');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class, 'email')->ignore($managedUser->id),
            ],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['required', 'in:user,trainer'],
            'status' => ['nullable', 'in:active,inactive'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
