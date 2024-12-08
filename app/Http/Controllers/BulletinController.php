<?php

namespace App\Http\Controllers;

use App\Mail\EmergencyBulletinEmail;
use App\Models\BulletinBoard;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class BulletinController extends Controller
{
    /**
     * Display the list of bulletins.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bulletins = BulletinBoard::latest()->get();
        return view('bulletin.index', compact('bulletins'));
    }

    /**
     * Show the form to create a new bulletin.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bulletin.create');
    }

    /**
     * Store a newly created bulletin in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            BulletinBoard::create([
                'message' => $request->message,
                'is_emergency' => false,
            ]);

            DB::commit();
            flash()->success('Bulletin created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Failed to create the bulletin. Please try again.');
        }

        return redirect()->route('dashboard');
    }

    public function storeEmergency(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            $bulletin = BulletinBoard::create([
                'message' => $request->message,
                'is_emergency' => true,
            ]);

            $users = User::all();
            foreach ($users as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'title' => 'New Emergency Bulletin Notification',
                    'message' => $request->message,
                ]);
                Mail::to($user->email)->send(new EmergencyBulletinEmail($user, $request->message));
            }
            DB::commit();
            flash()->success('Emergency bulletin created and notifications sent successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Failed to create the bulletin. Please try again.');
        }
        return redirect()->route('dashboard');
    }
}
