<?php

namespace App\Http\Controllers\Auth;

use App\Gebruiker;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'voornaam' => 'required|max:255',
            'achternaam' => 'required|max:255',
            'email' => 'required|email|max:255|unique:gebruikers',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function authApp(Request $request){
      $email = $request->input("email");
      $password = $request->input("password");

      if (Auth::attempt(['email' => $email, 'password' => $password])) {
        return response()->json(Auth::user());
      }else{
        return response()->json([201 => "Authentication failed"]);
      }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      return Gebruiker::create([
        'voornaam' => $data['voornaam'],
        'achternaam' => $data['achternaam'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
      ]);
    }
}
