<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function show()
    {
        return view('contactus');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            $to = config('mail.from.address', 'info@nutrizone.com.eg');
            Mail::raw($data['message'] . "\n\nFrom: {$data['name']} <{$data['email']}>", function ($message) use ($data, $to) {
                $message->to($to)->subject($data['subject'])->replyTo($data['email'], $data['name']);
            });

            return back()->with('success', 'تم إرسال رسالتك بنجاح، سنرد عليك قريباً.');
        } catch (\Exception $e) {
            Log::error('Contact send failed: ' . $e->getMessage());
            return back()->with('error', 'حدث خطأ أثناء إرسال الرسالة، حاول مرة أخرى لاحقاً.');
        }
    }
}
