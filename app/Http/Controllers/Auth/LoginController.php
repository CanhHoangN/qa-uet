<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $remember = $request->remember;
        $re = false;

        if(isset($remember))
        {
            $re = true;
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$re)) {
            // The user is active, not suspended, and exists.
            session()->forget('list');
            return redirect()->route('home');
        }else{
            return back()->withInput()->with('error',"Tài khoản hoặc mật khẩu không chính xác");
        }
    }

    public function showLoginForm()
    {
         return view('web.login');
    }
    public function logout(){
        session()->forget('list');
        Auth::logout();

        return redirect()->route("home");
    }

}
