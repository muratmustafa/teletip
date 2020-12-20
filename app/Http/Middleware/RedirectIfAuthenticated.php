<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        switch ($guard) {
          case 'admin':
            if (Auth::guard($guard)->check()) {
              return redirect()->intended(route('admin.home'));
            }
            break;

          case 'doctor':
            if (Auth::guard($guard)->check()) {
              return redirect()->intended(route('doctor.home'));
            }
            break;

          case 'web':
            if (Auth::guard($guard)->check()) {
              return redirect()->intended(route('user.home'));
            }
            break;

          default:
            if (Auth::guard($guard)->check()) {
              return redirect()->intended(RouteServiceProvider::HOME);
            }
            break;
        }

        return $next($request);
    }
}
