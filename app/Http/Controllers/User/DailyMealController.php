<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserDailyMeal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DailyMealController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'meal_type' => ['required', 'in:breakfast,lunch,dinner,snack'],
            'calories'  => ['nullable', 'integer', 'min:0'],
            'protein_g' => ['nullable', 'numeric', 'min:0'],
            'carb_g'    => ['nullable', 'numeric', 'min:0'],
            'fat_g'     => ['nullable', 'numeric', 'min:0'],
            'notes'     => ['nullable', 'string', 'max:500'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'meal_date' => ['required', 'date'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meals', 'public');
        }

        $request->user()->dailyMeals()->create([
            'name'       => $validated['name'],
            'meal_type'  => $validated['meal_type'],
            'calories'   => $validated['calories'] ?? null,
            'protein_g'  => $validated['protein_g'] ?? null,
            'carb_g'     => $validated['carb_g'] ?? null,
            'fat_g'      => $validated['fat_g'] ?? null,
            'notes'      => $validated['notes'] ?? null,
            'image_path' => $imagePath,
            'meal_date'  => $validated['meal_date'],
        ]);

        return back()->with('meal-added', 'تمت إضافة الوجبة بنجاح.');
    }

    public function destroy(UserDailyMeal $meal): RedirectResponse
    {
        abort_unless($meal->user_id === auth()->id(), 403);

        if ($meal->image_path) {
            Storage::disk('public')->delete($meal->image_path);
        }

        $meal->delete();

        return back()->with('meal-added', 'تم حذف الوجبة بنجاح.');
    }
}
