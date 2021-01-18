<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use App\Otp;

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
    protected $redirectTo = '/verifyotp';

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
        $message = [
            'required' => 'Kolom ::attribute wajib diisi!',
            'min' => 'Minimal 6 karakter',
            'confirmed' => 'Password tidak sama',
            'phone_number.unique' => 'Nomer HP sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'starts_with' => 'Harus dimulai dengan +62',
            'phone_number.regex' => 'No HP tidak valid!'
        ];
        return Validator::make(
            $data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:255', 'unique:users', 'starts_with:+62'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'required_with:password_confirmation','same:password_confirmation'],
            'password_confirmation' => 'min:6',
            'isAggree' => 'required'
            ], 
            $message
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services("$twilio_verify_sid")
            ->verifications
            ->create($data['phone_number'], "sms");
        return User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'isAggree' => $data['isAggree'],
        ]);
    }
}
