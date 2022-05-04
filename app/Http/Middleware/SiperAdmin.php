<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class SiperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         if (!Auth::check()) {
               return redirect()->route('login');
            }
                   
            if (Auth::user()->userType=='super') {
                return $next($request);
            }

        
             if (Auth::user()->userType=='member') {
    
               return redirect()->route('user')->with('error', 'Sorry,You have no permission to this page!');;

             }

             if (Auth::user()->userType=='memberadmin') {
    
               return redirect()->route('member-mgr')->with('error', 'Sorry,You have no permission to this page!');;

             }

             if (Auth::user()->userType=='pradmin') {
    
              return redirect()->route('pradmin')->with('error', 'Sorry,You have no permission to this page!');;

             }

              if (Auth::user()->userType=='financemgr') {
    
              return redirect()->route('financemgr')->with('error', 'Sorry,You have no permission to this page!');;

             }
           
             if (Auth::user()->userType=='educmgr') {
    
              return redirect()->route('educmgr')->with('error', 'Sorry,You have no permission to this page!');;

             }
        
          
    }
}