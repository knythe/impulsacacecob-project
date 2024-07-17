<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role_id;
    
            switch ($role) {
                case 7:
                    return redirect('/academiaimpulsa/home');
                case 9:
                    return redirect('/cacecobeirl/home');
                case 10:
                    return redirect('/academiaimpulsa/administrador/estatus');
                default:
                    return redirect('/home');
            }
        }
    
        return $next($request);
    }
    
}
