<?php  
  
namespace App\Http\Controllers\Auth;  
  
use App\Http\Controllers\Controller;  
use App\Models\User;  
use App\Providers\RouteServiceProvider;  
use Illuminate\Auth\Events\Registered;  
use Illuminate\Http\RedirectResponse;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Hash;  
use Illuminate\Validation\Rules;  
use Illuminate\View\View;  
  
class RegisteredUserController extends Controller  
{  
    /**  
     * Display the registration view.  
     */  
    public function create(): View  
    {  
        return view('auth.register');  
    }  
  
    /**  
     * Handle an incoming registration request.  
     *  
     * @throws \Illuminate\Validation\ValidationException  
     */  
    public function store(Request $request): RedirectResponse  
    {  
        $request->validate([  
            'name' => ['required', 'string', 'max:255'],  
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],  
            'password' => ['required', 'confirmed', Rules\Password::defaults()],  
            'role' => ['required', 'string', 'in:user'], // This ensures only 'user' role is accepted  
        ]);  
  
        $user = User::create([  
            'name' => $request->name,  
            'email' => $request->email,  
            'password' => Hash::make($request->password),  
            'role' => 'user', 
        ]);  
  
        event(new Registered($user));  
    
          // Langsung login user
    Auth::login($user);

    // Redirect ke halaman home
    return redirect(RouteServiceProvider::HOME)->with('success', 'Akun berhasil dibuat dan Anda telah login.');
    }  
}  
