<?php

namespace App\Http\Controllers;

use App\Models\Buku;  
use App\Models\Kategori;  
use App\Models\Peminjaman;  
use App\Models\User;  
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminDashboardController extends Controller  
{  
    public function dashboard(Request $request)  
    {  
        

        $totalBuku = Buku::count();  
        $totalPeminjaman = Peminjaman::count();  
        $totalKategori = Kategori::count();  
        $totalUser = User::count();  
        
        $peminjamans = Peminjaman::with(['user', 'buku'])
        ->orderBy('tanggal_pinjam', 'desc')
        ->limit(5)
        ->get();

        $users = User::orderBy('name')->limit(5)->get();

        $kategoris = Kategori::withCount('buku') 
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        $bukus = Buku::orderBy('created_at')->limit(5)->get();


        // Mengirim data ke view
        return view('admin.dashboard', [  
            'totalBuku' => $totalBuku,  
            'totalKategori' => $totalKategori, 
            'totalPeminjaman' => $totalPeminjaman,   
            'totalUser' => $totalUser,  
            'peminjamans' => $peminjamans,
            'users' => $users,
            'kategoris' =>$kategoris,
            'bukus' => $bukus,
        ]);  
    }  


}
