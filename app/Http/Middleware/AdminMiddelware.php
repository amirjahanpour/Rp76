<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class AdminMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            if (Auth::check()) {
            if (Auth::user()->is_admin != 1
                and
                !$request->is("*edit")
                and
                Route::getCurrentRoute()->getName() != "user.update"
                and
                Route::getCurrentRoute()->getName() != "logout"){
                $url = URL::signedRoute("user.edit", ["user" => Auth::id()]);
                return redirect($url);
            }
        }

        return $next($request);
    }
}
