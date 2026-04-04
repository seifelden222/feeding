<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\TrainerPlanDraft;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanManageController extends Controller
{
    public function index(Request $request): View
    {
        $savedDraft = TrainerPlanDraft::query()
            ->where('trainer_user_id', $request->user()->id)
            ->first()?->payload ?? [];

        return view('trainer.plansmanage', [
            'savedDraft' => $savedDraft,
        ]);
    }

    public function saveDraft(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'payload' => ['nullable', 'array'],
        ]);

        TrainerPlanDraft::query()->updateOrCreate(
            ['trainer_user_id' => $request->user()->id],
            ['payload' => $validated['payload'] ?? []]
        );

        return response()->json([
            'status' => 'ok',
        ]);
    }
}
