<?php

namespace App\Http\Controllers;

use App\Models\NutritionPlan;
use App\Models\UserNutritionPlan;
use Illuminate\Http\Request;

class UserNutritionPlanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nutrition_plan_id' => ['required', 'exists:nutrition_plans,id'],
        ]);

        $user = $request->user();

        $planId = $request->input('nutrition_plan_id');

        $existing = UserNutritionPlan::query()
            ->where('user_id', $user->id)
            ->where('nutrition_plan_id', $planId)
            ->first();

        if ($existing) {
            return response()->json(['message' => 'الخطة مضافة بالفعل.'], 200);
        }

        $unp = UserNutritionPlan::create([
            'user_id' => $user->id,
            'nutrition_plan_id' => $planId,
            'is_primary' => false,
        ]);

        return response()->json(['message' => 'تم إضافة النظام بنجاح.', 'id' => $unp->id]);
    }
}
