<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class IsAdmin
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
        if (! auth()->user()) {
            return redirect()->route('login');
        } elseif (auth()->user()->admin != 1) {
            Auth::guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();

            return redirect()->route('login')->withErrors('Wrong Email Or Password');;
        }
        return $next($request);
    }

}
