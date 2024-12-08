<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $recipientEmail = $request->input('email');
        Mail::to($recipientEmail)->send(new SampleEmail());
        return response()->json(['message' => 'Email sent successfully!']);
    }
}
