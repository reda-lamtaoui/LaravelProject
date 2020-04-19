<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user=User::where('id',Auth::id())->first();
        if (Auth::guard($guard)->check()) {
            if($user->is_admin()){
                return redirect()->route('dashboard');
            }else{
                return redirect(RouteServiceProvider::HOME);
            }
            
        }

        return $next($request);
    }
}
