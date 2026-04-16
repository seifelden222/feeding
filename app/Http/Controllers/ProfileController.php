<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BodyImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(Request $request): RedirectResponse
    {
        $settingsRoute = $request->user()?->isTrainer()
            ? 'trainer.settings'
            : 'user.settings';

        return Redirect::route($settingsRoute);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $data = $request->validated();

        // handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo_path'] = $path;
        }

        // fill other attributes and save
        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // handle body images (multiple)
        if ($request->hasFile('body_images')) {
            foreach ($request->file('body_images') as $file) {
                if (! $file->isValid()) {
                    continue;
                }
                $p = $file->store('body_images', 'public');
                BodyImage::create([
                    'user_id' => $user->id,
                    'path' => $p,
                    'recorded_at' => now(),
                ]);
            }
        }

        return back()->with('status', 'profile-updated');
    }

    public function uploadPhotos(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'body_images' => ['nullable', 'array'],
            'body_images.*' => ['image', 'max:4096'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
            $user->save();
        }

        if ($request->hasFile('body_images')) {
            foreach ($request->file('body_images') as $file) {
                if (! $file->isValid()) {
                    continue;
                }
                $p = $file->store('body_images', 'public');
                BodyImage::create([
                    'user_id' => $user->id,
                    'path' => $p,
                    'recorded_at' => now(),
                ]);
            }
        }

        return back()->with('status', 'photos-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
