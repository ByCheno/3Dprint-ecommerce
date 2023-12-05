<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Closure|RedirectResponse|Response
    {
        if (Auth::user() &&  Auth::user()->role_id == 1) {
            return $next($request);
       }

       return redirect()->route('index')->with('error','No tienes permisos de administrador');
    }
}
