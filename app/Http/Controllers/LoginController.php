<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user=User::where('email',$request->email)->first();

            if($user->is_admin()){
                Session::put('admin', '1');
                return redirect()->route('dashboard');
            }else{
                return redirect()->intended('home');
            }
            
        }
        $error = \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['email incorrect'],
            'password' => ['password incorrect'],
         ]);
         throw $error;
    }
}