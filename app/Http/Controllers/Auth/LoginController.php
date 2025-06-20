<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function login(Request $request,User $user)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if(auth()->user()->status == 1){
                $request->session()->flash('new-login-success');
                return redirect()->route('home');
            }
             if(auth()->user()->status != 1){
                Auth::guard('web')->logout();
                $request->session()->flash('verify-user');
                return redirect()->route('login');  #รออนุมัติ
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('logout-success');
        return redirect()->route('login');
    }
}