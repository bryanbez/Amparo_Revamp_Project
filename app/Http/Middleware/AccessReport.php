<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessReport
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if(Auth::check() == false) {
        abort(403, 'You do not have permission to access this page.');
      } else {
        if(Auth::user()->name != 'admin' || Auth::user()->name == 'null') {
          abort(403, 'You do not have permission to access this page.');
        } else {
          return $next($request);
        }
      }

    }
}
