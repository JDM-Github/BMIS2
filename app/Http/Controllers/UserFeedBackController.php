<?php

namespace App\Http\Controllers;

use App\Models\UserFeedBack;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserFeedBackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        UserFeedBack::create(
            [
                'user_id' => auth()->id(),
                'description' => $request->description,
            ]
        );

        flash()->success('Feedback Successfully Sent');

        return redirect()->back();
    }
}
