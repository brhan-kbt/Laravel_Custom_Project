<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('user.dashboard');
    }
    
     public function memberadmin()
    {
        return view('memberadmin.dashboard');
    }

}