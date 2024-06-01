<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//logoutメソッドで扱うRequestを明示する
use Illuminate\Http\Request;

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

    //use AuthenticatesUsers;
    
    use AuthenticatesUsers {
    logout as performLogout;
}
    //logoutメソッド　logout時にmainへredirectする
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('main'); 
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     
    //login時もmain画面へ移動する 
    protected $redirectTo = '/';
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
