<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserNutritionPlan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request): View
    {
        $subscriptions = UserNutritionPlan::query()
            ->with(['user:id,name,email,status', 'nutritionPlan:id,title'])
            ->latest('assigned_at')
            ->latest('created_at')
            ->paginate(12);

        $stats = [
            'total' => UserNutritionPlan::query()->count(),
            'primary' => UserNutritionPlan::query()->where('is_primary', true)->count(),
            'newThisWeek' => UserNutritionPlan::query()->where('created_at', '>=', now()->startOfWeek())->count(),
        ];

        return view('admin.subscriptions', [
            'subscriptions' => $subscriptions,
            'stats' => $stats,
        ]);
    }
}
