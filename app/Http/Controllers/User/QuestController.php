<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class QuestController extends Controller
{
    public function index(Request $request): View
    {
        $trainers = User::where('role', 'trainer')->get();

        $assignment = DB::table('user_trainer_assignments')
            ->where('user_id', $request->user()->id)
            ->first();

        $currentTrainer = $assignment
            ? User::find($assignment->trainer_id)
            : null;

        return view('user.quest', [
            'user'           => $request->user(),
            'trainers'       => $trainers,
            'currentTrainer' => $currentTrainer,
        ]);
    }

    public function assign(Request $request): JsonResponse
    {
        $request->validate([
            'trainer_id' => ['required', 'exists:users,id'],
        ]);

        $trainer = User::findOrFail($request->trainer_id);

        if ($trainer->role !== 'trainer') {
            return response()->json(['error' => 'المستخدم المحدد ليس مدرباً'], 422);
        }

        DB::table('user_trainer_assignments')->updateOrInsert(
            ['user_id' => $request->user()->id],
            ['trainer_id' => $request->trainer_id, 'assigned_at' => now(), 'updated_at' => now(), 'created_at' => now()]
        );

        return response()->json([
            'success'      => true,
            'trainer_name' => $trainer->name,
        ]);
    }
}
