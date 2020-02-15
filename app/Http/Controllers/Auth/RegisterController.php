<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Country;
use App\Event;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'event_id' => ['required', 'numeric'],

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required', 'captcha'],

            'sex' => ['required', 'string', 'max:1'],
            'nationality' => ['required', 'string'],
            'id_type' => ['required', 'string'],
            'id_number' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'phone' => ['required', 'numeric'],
            'community_name' => ['required', 'string'],
            'community_type' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'event_id' => $data['event_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'USER',

            'sex' => $data['sex'],
            'nationality' => $data['nationality'],
            'id_type' => $data['id_type'],
            'id_number' => $data['id_number'],
            'date_of_birth' => $data['date_of_birth'],
            'phone' => $data['phone'],
            'community_name' => $data['community_name'],
            'community_type' => $data['community_type'],

            'status' => 'registered',
        ]);
    }

    public function showRegistrationForm()
    {
        $countries = Country::orderBy('name', 'asc')->get();
        $events = Event::all();

        return view('auth.register', [
            'countries' => $countries,
            'events' => $events,
        ]);
    }
}
