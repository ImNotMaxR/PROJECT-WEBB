<?php

namespace App\Http\Controllers;

use App\Models\Buku;  
use App\Models\Kategori;  
use App\Models\User;  

use Illuminate\Http\Request;

class AdminDashboardController extends Controller  
{  
    public function dashboard()  
    {  
        

        $totalBuku = Buku::count();  
        $totalKategori = Kategori::count();  
        $totalUser = User::count();  
        

        // Mengirim data ke view
        return view('admin.dashboard', [  
            'totalBuku' => $totalBuku,  
            'totalKategori' => $totalKategori,  
            'totalUser' => $totalUser,  
        ]);  
    }  
}
