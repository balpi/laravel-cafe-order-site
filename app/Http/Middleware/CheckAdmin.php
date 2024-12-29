<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Str;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = Auth::user()->roles->pluck('name');
        $userNmae = Auth::user()->name;
        error_log('User Role  ' . $userRole);

        if (!Str::contains($userRole, 'admin')) {
            abort(403, 'You are not authorized to access this page');


        }
        return $next($request);
    }
}
