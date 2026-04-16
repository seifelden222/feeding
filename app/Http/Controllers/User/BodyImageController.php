<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BodyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BodyImageController extends Controller
{
    public function index(Request $request)
    {
        $images = $request->user()->bodyImages()->latest()->get();

        return view('user.body_images', compact('images'));
    }

    public function destroy(Request $request, BodyImage $bodyImage)
    {
        // authorize owner
        if ($bodyImage->user_id !== $request->user()->id) {
            abort(403);
        }

        // delete file from storage
        if ($bodyImage->path && Storage::disk('public')->exists($bodyImage->path)) {
            Storage::disk('public')->delete($bodyImage->path);
        }

        $bodyImage->delete();

        return back()->with('status', 'body-image-deleted');
    }
}
