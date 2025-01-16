<?php  
  
namespace App\Http\Middleware;  
  
use Closure;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
  
class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Case-insensitive role check
            if ($role && strtolower($user->role) === strtolower($role)) {
                return $next($request);
            }

            // Redirect non-matching roles
            return redirect('/home')->with('error', 'Unauthorized access');
        }

        // Redirect unauthenticated users
        return redirect('/home')->with('error', 'Please log in first');
    }
}