<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female,Other'], // Adjust the options as needed
            'contact_number' => ['required', 'string', 'max:15'], // Adjust max length as needed
            'address' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'number_of_years' => ['required', 'numeric'],
            'id_pic' => ['required', 'file', 'mimes:pdf,docx', 'max:2048'], // Adjust file types and size as needed
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'last_name' => $data['last_name'],
            'name' => $data['name'],
            'middle_name' => $data['middle_name'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'contact_number' => $data['contact_number'],
            'email' => $data['email'],
            'number_of_years' => $data['number_of_years'],
            'password' => Hash::make($data['password']),
            'id_pic' => $data['id_pic']->store('idPicture', 'public'),
        ]);

        $user->assignRole('resident');

        House::create(
            [
                'user_id' => $user->id,
                'address' => $data['address'],
                'barangay' => $data['barangay'],
                'municipality' => $data['municipality'],
                'province' => $data['province'],
            ]
        );

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if ($user->email_verified_at == null) {
            flash()->success('Wait For the Admin to Review your account and Verify your Email Address');

            return redirect()->route('home');
        }
    }
}
