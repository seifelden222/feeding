<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserWaterLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WaterLogController extends Controller
{
    public function addCup(Request $request): JsonResponse
    {
        $today = now()->toDateString();

        $log = UserWaterLog::firstOrCreate(
            ['user_id' => $request->user()->id, 'log_date' => $today],
            ['cups' => 0]
        );

        if ($log->cups >= 8) {
            return response()->json(['cups' => $log->cups, 'message' => 'اكتملت الكمية']);
        }

        $log->increment('cups');

        return response()->json(['cups' => $log->fresh()->cups]);
    }
}
