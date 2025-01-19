<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;    
use App\Models\Kategori;     
use Illuminate\Support\Facades\Storage;    
use Yajra\DataTables\DataTables;  
use Illuminate\Support\Facades\Auth;    
use App\Models\Peminjaman;    
use App\Models\User;    
  
class PinjamController extends Controller
{

    public function userPeminjaman()
{
    $userId = Auth::id(); // Mendapatkan ID user yang sedang login

    // Query data peminjaman berdasarkan user yang login
    $peminjaman = Peminjaman::where('user_id', $userId)
        ->with('buku') // Memuat relasi ke buku
        ->get();

    // Kirim data ke view
    return view('pinjam.peminjaman', compact('peminjaman'));
}

}
