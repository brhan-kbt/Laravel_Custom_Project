<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username';
    }


//     public function redirectTo(){
//         switch (Auth::user()->userType) {
//             case 'super':
//                $this->redirectTo('/admin');
//                return  $this->redirectTo;
//                 break;
//             case 'member':
//                $this->redirectTo('/user');
//                return  $this->redirectTo;
//                 break;
                
//             case 'memberadmin':
//                $this->redirectTo('/member/admin');
//                return  $this->redirectTo;
//                 break;
            
//             default:
//                 # code...
//                 break;
//         }
//     }


// public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'username' => ['required'],
//             'password' => ['required'],
//         ]);
 
//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();
//             if(Auth::user()->userType=='member'){
//                     return redirect()->route('user');
//             }
//             else if(Auth::user()->userType=='super'){
//                  return redirect()->route('admin');
//             }
//             else if(Auth::user()->userType=='memberadmin'){
//                  return redirect()->route('member-mgr');
//             }
//         }
 
//         return back()->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ]);
//     }
}