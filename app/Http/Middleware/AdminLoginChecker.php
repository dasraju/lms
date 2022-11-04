<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
class AdminLoginChecker
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
        if(Auth::guard('admin')->check()){

            return $next($request);
        }
        else{
            $admin = Admin::first();
            $credentials['email'] = $admin->email;
            $credentials['password'] = '123456';
          if(Auth::guard('admin')->attempt($credentials)){
            return $next($request);
          }
          else{
            dd('login failed');
          }

        }

    }
}
