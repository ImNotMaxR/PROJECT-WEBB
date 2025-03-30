<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\AccountSettingsUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        return view('profile.index', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();
        $avatarPath = $user->avatar; // Gunakan avatar lama jika tidak ada perubahan
    
        // Cek apakah avatar ingin dihapus (avatar_remove bernilai 1)
        if ($request->input('avatar_remove') == '1') {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $avatarPath = null;
            Log::info('Avatar dihapus oleh pengguna.');
        }
        // Jika tidak dihapus, cek apakah ada avatar baru yang diunggah
        elseif ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
    
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
    
            // Simpan avatar baru di folder `public/avatar`
            $avatarPath = $avatar->store('avatar', 'public');
            
            // Pastikan kita menyimpan path yang benar (tanpa 'public/')
            // Sistem penyimpanan Laravel menyimpan dengan prefix 'public/', tapi saat akses
            // kita tidak perlu prefix tersebut karena sudah di-link ke folder public
            Log::info('Avatar baru disimpan: ' . $avatarPath);
        }
    
        // Debug sebelum update
        Log::info('Avatar Path sebelum update: ' . ($avatarPath ?? 'NULL'));
    
        // Update semua data termasuk avatar
        $user->update([
            'first_name' => $validated['fname'],
            'last_name' => $validated['lname'] ?? null,
            'kelas' => $validated['kelas'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
            'no_telepon' => $validated['no_telepon'],
            'avatar' => $avatarPath, // Update avatar di sini
        ]);
    
        return  redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
    
    public function updateAccountSettings(AccountSettingsUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();
    
        // Update username jika ada perubahan
        if (isset($validated['name'])) {
            $user->name = $validated['name'];
        }
    
        // Update email jika ada perubahan
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }
    
        // Update password jika ada perubahan
        if (isset($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'nullable|string|max:255',
            'kelas' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:1000',
            'no_telepon' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $user = Auth::user();
        
        // Handle avatar upload
        $avatarPath = $user->avatar; // Keep existing avatar if no new one is uploaded
        
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }
        
        // If avatar_remove is set to 1, remove the avatar
        if ($request->input('avatar_remove') == 1 && $user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $avatarPath = null;
        }
        
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = User::find($userId); // Get the actual model
        
        $user->first_name = $validated['fname'];
        $user->last_name = $validated['lname'];
        $user->kelas = $validated['kelas'];
        $user->tanggal_lahir = $validated['tanggal_lahir'];
        $user->alamat = $validated['alamat'];
        $user->no_telepon = $validated['no_telepon'];
        $user->avatar = $avatarPath;
        $user->onboarding = true;
        $user->save();
        
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
    
        $user = $request->user();
    
        Auth::logout();
    
        $user->delete();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
    }
}
