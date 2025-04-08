<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;


class MemberController extends Controller  
{  
    public function index()  
    {  
        
        $checkrole = auth()->user()->role;
    
        // Jika superadmin, tampilkan user dan admin
        if ($checkrole === 'superadmin') {
            $users = User::whereIn('role', ['user', 'admin'])->get();
        } 
        // Jika admin atau role lainnya, hanya tampilkan user
        else {
            $users = User::where('role', 'user')->get();
        }
        
        return view('member.index', compact('users'));
    } 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'kelas' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Create user with default 'user' role
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user'; // Default role set to 'user'
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->kelas = $request->kelas;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;

        // Handle avatar upload if provided
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $path = $request->file('avatar')->storeAs('avatars', $avatarName, 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('member.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('member.edit', compact('user'));
    }
    

    public function update(Request $request, User $user)
    {
        if ($request->email === $request->original_email) {
            $request->request->remove('email');
        }
        
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'first_name' => ['sometimes', 'string', 'max:255'],
            'last_name' => ['sometimes', 'string', 'max:255'],
            'email' => $request->has('email') ? ['sometimes', 'email', 'unique:users,email,' . $user->id] : [],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'kelas' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable', 'string'],
            'no_telepon' => ['nullable', 'string', 'max:15'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'avatar_remove' => ['nullable'],
            'role' => ['in:user,admin'], // Validasi role

        ]);

        // Update nama pengguna
        if ($request->filled('name')) {
            $user->name = $validated['name'];
        }

        // Update detail akun
        $user->first_name = $request->filled('first_name') ? $validated['first_name'] : $user->first_name;
        $user->last_name = $request->filled('last_name') ? $validated['last_name'] : $user->last_name;
        $user->email = $request->filled('email') ? $validated['email'] : $user->email;
        $user->kelas = $request->filled('kelas') ? $validated['kelas'] : $user->kelas;
        $user->tanggal_lahir = $request->filled('tanggal_lahir') ? $validated['tanggal_lahir'] : $user->tanggal_lahir;
        $user->alamat = $request->filled('alamat') ? $validated['alamat'] : $user->alamat;
        $user->no_telepon = $request->filled('no_telepon') ? $validated['no_telepon'] : $user->no_telepon;

        if ($request->filled('role')) {
            $user->role = $validated['role'];
        }
        
        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            // Upload avatar baru
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        
        // Hapus avatar jika avatar_remove diklik
        if ($request->filled('avatar_remove') && $request->input('avatar_remove') == '1') {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = null;
        }

        $user->save();

        return redirect()->route('member.edit', $user)->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Pastikan tidak menghapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('member.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Hapus avatar jika ada
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Hapus user
        $user->delete();

        return redirect()->route('member.index')->with('success', 'User berhasil dihapus.');
    }

   
}
