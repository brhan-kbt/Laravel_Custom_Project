<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Http\Traits\QueryMessage;

class UserAccountController extends Controller
{
    use QueryMessage;
    

    // public function redirectTo(){
    //     switch (Auth::user()->userType) {
    //         case 'super':
    //            $this->redirectTo('/admin');
    //            return  $this->redirectTo;
    //             break;
    //         case 'member':
    //            $this->redirectTo('/user');
    //            return  $this->redirectTo;
    //             break;
                
    //         case 'memberadmin':
    //            $this->redirectTo('/member/admin');
    //            return  $this->redirectTo;
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }
    // }


//   public function __construct()
//     {
//         $this->middleware('auth');
//     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
         // return view('layouts.admin_dash');

    }   
    
    
    public function admin()
    {
        return view('super-admin.dashboard');
    }

     public function user()
    {
        $messages=$this->getAllMessage();
        return view('user.dashboard')->with('messages', $messages);
    } 
    
    public function register()
    {
      return view('memberadmin.registerform');

    }

     public function memberadmin()
    {
        return view('memberadmin.dashboard');
    }
      public function pradmin()
    {
        return view('pradmin.dashboard');
    }


    public function financemgr()
    {
        return view('financeAdmin.dashboard');
    }

     public function educmgr()
    {
        return view('EducationAdmin.dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            if(Auth::user()->userType=='member'){
                    return redirect()->route('user');
            }
            else if(Auth::user()->userType=='super'){
                 return redirect()->route('admin');
            }
            else if(Auth::user()->userType=='memberadmin'){
                 return redirect()->route('member-mgr');
            }

             else if(Auth::user()->userType=='pradmin'){
                 return redirect()->route('pradmin');
            }

            else if(Auth::user()->userType=='financemgr'){
                 return redirect()->route('financemgr');
            }

            else if(Auth::user()->userType=='educmgr'){
                 return redirect()->route('educmgr');
            }
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}