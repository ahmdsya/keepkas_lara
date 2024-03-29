<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest')->except(['logout', 'logoutUser']);
    }

    public function logoutUser()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function username()
    {
        $this->username = filter_var(request()->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username => request()->username]);

        return property_exists($this, 'username') ? $this->username : 'email';
    }
}
