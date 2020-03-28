<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        // dd($this->validateLogin($request));
        $this->validateLogin($request);
        
        $remeber = true;
        if ($request->remember == 'on') {
            $remeber = true;
        }else{
            $remeber = false;
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$remeber)) {
            if (Auth::user()->active == 1) {
                if (Auth::user()->hasRole('Customer')) {
                    return redirect()->route('home');
                }else{
                    return redirect()->route('dashboard_index');
                }
            }
            if(Auth::user()->active == 0){
                $this->guard()->logout();
                $request->session()->invalidate();
                return back()->with('active',__('tr.Please wait for approval from the Admin'));
            }
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
