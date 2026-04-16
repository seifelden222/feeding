<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function join(Request $request, Consultation $consultation): JsonResponse
    {
        abort_unless($consultation->trainer_id === $request->user()->id, 403);

        $consultation->update([
            'status'    => 'in_progress',
            'joined_at' => now(),
        ]);

        return response()->json([
            'room_code' => $consultation->room_code,
            'room_url'  => 'https://meet.jit.si/' . $consultation->room_code,
        ]);
    }

    public function approve(Request $request, Consultation $consultation): JsonResponse
    {
        abort_unless($consultation->trainer_id === $request->user()->id, 403);

        $consultation->update([
            'status'      => 'approved',
            'approved_at' => now(),
        ]);

        return response()->json([
            'room_code' => $consultation->room_code,
            'room_url'  => 'https://meet.jit.si/' . $consultation->room_code,
        ]);
    }

    public function seed(Request $request)
    {
        $trainer = $request->user();

        $samples = [
            ['client_name' => 'أحمد محمد', 'consultation_type' => 'initial',   'status' => 'pending', 'scheduled_at' => now()],
            ['client_name' => 'سارة علي',  'consultation_type' => 'followup',  'status' => 'pending', 'scheduled_at' => now()->addHours(3)],
            ['client_name' => 'خالد فهد',  'consultation_type' => 'plan_edit', 'status' => 'pending', 'scheduled_at' => now()->addDay()],
        ];

        foreach ($samples as $sample) {
            Consultation::firstOrCreate(
                ['trainer_id' => $trainer->id, 'client_name' => $sample['client_name']],
                array_merge($sample, ['room_code' => Consultation::generateRoomCode()])
            );
        }

        // If the request expects JSON (AJAX), return JSON. Otherwise redirect back with a flash message.
        if ($request->wantsJson()) {
            return response()->json(['seeded' => true]);
        }

        return redirect()->route('trainer.home')->with('seeded', true);
    }
}
