<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserDailyMeal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlansController extends Controller
{
    public function index(Request $request): View
    {
        $today = now()->toDateString();

        $meals = $request->user()->dailyMeals()
            ->whereDate('meal_date', $today)
            ->orderBy('meal_type')
            ->orderBy('created_at')
            ->get();

        // If user has no personal daily meals for today, try to show meals from assigned primary NutritionPlan
        if ($meals->isEmpty()) {
            $plan = $request->user()->primaryNutritionPlan();
            if ($plan) {
                // get meal templates for the plan; order by sequence_no
                $templates = $plan->mealTemplates()->orderBy('nutrition_plan_meals.sequence_no')->get();

                // transform templates to a view-friendly collection similar to UserDailyMeal
                $meals = $templates->map(function ($t) {
                    return (object) [
                        'id' => 'tpl-'.$t->id,
                        'name' => $t->name,
                        'calories' => $t->default_calories,
                        'notes' => $t->meal_notes,
                        'meal_type' => $t->meal_type ?? 'breakfast',
                        'consumed_at' => null,
                    ];
                });
            } else {
                // fallback: if user selected_system is set, provide simple mapping (no DB plan)
                $sel = $request->user()->selected_system;
                if ($sel) {
                    if ($sel === 'diabetes') {
                        $meals = collect([
                            (object)['id'=>'tpl-d-1','name'=>'شوفان مع فاكهة ومكسرات','calories'=>380,'notes'=>'','meal_type'=>'breakfast','consumed_at'=>null],
                            (object)['id'=>'tpl-d-2','name'=>'سلطة تونة مع خبز كامل','calories'=>520,'notes'=>'','meal_type'=>'lunch','consumed_at'=>null],
                            (object)['id'=>'tpl-d-3','name'=>'خضار مشوي مع سمك','calories'=>300,'notes'=>'','meal_type'=>'dinner','consumed_at'=>null],
                        ]);
                    } elseif ($sel === 'muscle_building') {
                        $meals = collect([
                            (object)['id'=>'tpl-m-1','name'=>'بيضتين مع توست بروتين','calories'=>520,'notes'=>'','meal_type'=>'breakfast','consumed_at'=>null],
                            (object)['id'=>'tpl-m-2','name'=>'صدر دجاج مع بطاطا حلوة','calories'=>700,'notes'=>'','meal_type'=>'lunch','consumed_at'=>null],
                            (object)['id'=>'tpl-m-3','name'=>'سموثي بروتين مع موز','calories'=>420,'notes'=>'','meal_type'=>'dinner','consumed_at'=>null],
                        ]);
                    } else {
                        $meals = collect([
                            (object)['id'=>'tpl-w-1','name'=>'أومليت خضار مع خبز شوفان','calories'=>450,'notes'=>'','meal_type'=>'breakfast','consumed_at'=>null],
                            (object)['id'=>'tpl-w-2','name'=>'دجاج مشوي مع أرز وخضار','calories'=>620,'notes'=>'','meal_type'=>'lunch','consumed_at'=>null],
                            (object)['id'=>'tpl-w-3','name'=>'زبادي يوناني مع فاكهة ومكسرات','calories'=>320,'notes'=>'','meal_type'=>'dinner','consumed_at'=>null],
                        ]);
                    }
                }
            }
        }

        return view('user.plans', [
            'meals' => $meals,
            'today' => $today,
        ]);
    }

    public function consume(Request $request, UserDailyMeal $meal): JsonResponse
    {
        abort_unless($meal->user_id === $request->user()->id, 403);

        $meal->update(['consumed_at' => now()]);

        return response()->json(['consumed' => true]);
    }
}
