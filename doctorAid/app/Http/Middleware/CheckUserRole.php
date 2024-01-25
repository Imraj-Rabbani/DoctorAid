<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {

            if (!Auth::check()) {
                return redirect('/login');
            }
    
            $role = Auth::user()->role; 
    

            if ($role == 'admin') {
                return $next($request);
            } else {
                return redirect()->route('homepage')->with('message','User access denied');
            }
        }
    }
}
