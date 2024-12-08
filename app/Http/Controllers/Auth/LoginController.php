<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->email_verified_at == null) {
            return redirect()->route('home');
        }

        if ($user->status === null || $user->status === '') {
            auth()->logout();

            throw ValidationException::withMessages([
                'email' => [trans('Account is not Activate! Please Contact the Admin.')],
            ]);

            return redirect()->route('login');
        }

        if ($user->status == false || $user->status == 0) {
            auth()->logout();

            throw ValidationException::withMessages([
                'email' => [trans('Account is Rejected! Please Contact the Admin.')],
            ]);

            return redirect()->route('login');
        }

        if ($user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        if ($user->isImbestigador()) {
            return redirect()->route('blotter.index');
        }

        return redirect()->route('home');
    }
}
