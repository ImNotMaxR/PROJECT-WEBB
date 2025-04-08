<?php  
  
namespace App\Http\Middleware;  
  
use Closure;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
use App\Providers\RouteServiceProvider;  

  
class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Case-insensitive role check
            if (in_array(strtolower($user->role), array_map('strtolower', $roles))) {
                return $next($request);
            }

            // Redirect non-matching roles
            return redirect(RouteServiceProvider::HOME)->with('error', 'Role anda Berbeda');
        }

        // Redirect unauthenticated users
        return redirect(RouteServiceProvider::HOME)->with('error', 'Harus Login Dulu!');
    }
}