<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $today = now()->toDateString();

        $meals = $user->dailyMeals()
            ->whereDate('meal_date', $today)
            ->orderBy('created_at')
            ->get();

        $waterLog = \App\Models\UserWaterLog::firstOrCreate(
            ['user_id' => $user->id, 'log_date' => $today],
            ['cups' => 0]
        );

        // compute nutrient totals from today's meals
        $totalCalories = $meals->sum(function ($m) { return $m->calories ?? 0; });
        $totalProtein = $meals->sum(function ($m) { return $m->protein_g ?? 0; });
        $totalCarb = $meals->sum(function ($m) { return $m->carb_g ?? 0; });
        $totalFat = $meals->sum(function ($m) { return $m->fat_g ?? 0; });

        // determine daily calorie target from user's primary plan if available
        $dailyTarget = optional($user->primaryNutritionPlan())->daily_calorie_target ?? 2100;

        return view('user.home', [
            'user' => $user,
            'meals' => $meals,
            'today' => $today,
            'waterCups' => $waterLog->cups,
            'totalCalories' => $totalCalories,
            'totalProtein' => $totalProtein,
            'totalCarb' => $totalCarb,
            'totalFat' => $totalFat,
            'dailyTarget' => $dailyTarget,
        ]);
    }
}
