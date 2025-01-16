<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**  
     * Handle an incoming request.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @param  \Closure  $next  
     * @param  string  $role  
     * @return mixed  
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated  
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated  
        }

        // Get the authenticated user's role  
        $userRole = Auth::user()->role;

        // Check if the authenticated user has the required role  
        if ($userRole === $role) {
            return $next($request); // Allow access to the dashboard  
        }

        // Redirect to home if the role does not match  
        return redirect(route('home'));
    }
}
