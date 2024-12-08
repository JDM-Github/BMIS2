<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $notifications = Notification::where('user_id', auth()->id())->get();
        if ($notifications->isEmpty()) {
            Notification::create([
                'user_id' => auth()->id(),
                'title' => 'Hello User',
                'message' => 'You have no notifications at the moment.',
            ]);
            $notifications = Notification::where('user_id', auth()->id())->get();
        }
        return view('auth.profile', compact('notifications'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        // Update the password if provided
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Update the user's profile with the provided fields
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'number_of_years' => $request->number_of_years,
            'contact_number' => $request->contact_number,
        ]);

        // Handle the ID picture upload if provided
        if ($request->hasFile('id_pic')) {
            $idPicPath = $request->file('id_pic')->store('id_pics', 'public');
            $user->update(['id_pic' => $idPicPath]);
        }

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
