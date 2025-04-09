<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;    
use App\Models\Kategori;     
use Illuminate\Support\Facades\Storage;    
use Yajra\DataTables\DataTables;  
use Illuminate\Support\Facades\Auth;    
use App\Models\Peminjaman;    
use Carbon\Carbon;
use App\Models\User;    
  
class PeminjamanController extends Controller
{
    public function index()  
    {  
        $this->checkAndUpdateDenda();
        $data = Peminjaman::with(['user', 'buku'])->get();
        return view('buku.peminjaman', compact('data'));  
    } 

    private function checkAndUpdateDenda()
{
    // Ambil semua peminjaman dengan status 'disetujui'
    $peminjaman = Peminjaman::where('status', 'disetujui')->get();
    $today = now()->startOfDay();
    
    foreach ($peminjaman as $pinjam) {
        $tanggalKembali = Carbon::parse($pinjam->tanggal_kembali)->startOfDay();
        
        // Jika sudah melewati tanggal kembali
        if ($today->gt($tanggalKembali)) {
            $pinjam->status = 'denda';
            $pinjam->save();
        }
    }
}

public function getDendaInfo($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $tanggalKembali = Carbon::parse($peminjaman->tanggal_kembali)->startOfDay();
    $today = now()->startOfDay();
    
    if ($peminjaman->status !== 'denda' || !$today->gt($tanggalKembali)) {
        return response()->json([
            'status' => false,
            'message' => 'Tidak ada denda untuk peminjaman ini'
        ]);
    }
    
    $hariTerlambat = $today->diffInDays($tanggalKembali);
    $jumlahDenda = $hariTerlambat * 3000;
    
    return response()->json([
        'status' => true,
        'hari_terlambat' => $hariTerlambat,
        'jumlah_denda' => $jumlahDenda,
        'formatted_denda' => 'Rp ' . number_format($jumlahDenda, 0, ',', '.')
    ]);
}
    
    public function updateStatus(Request $request)    
{    
    $request->validate([    
        'id' => 'required|exists:peminjaman,id',    
        'status' => 'required|in:pending,disetujui,ditolak,dikembalikan,denda',    
    ]);    
  
    $peminjaman = Peminjaman::find($request->id);    
  
    // Update stock based on status  
    if ($request->status == 'disetujui') {  
        // Decrease stock when approved  
        $peminjaman->buku->decrement('stok');  
    } elseif ($request->status == 'dikembalikan') {  
        // Increase stock when returned  
        $peminjaman->buku->increment('stok');  
    } elseif ($request->status == 'ditolak') {  
        // No stock change if rejected  
    }  

    $peminjaman->status = $request->status;    
    $peminjaman->save();    
  
    return response()->json(['success' => true]);    
}  

    public function destroyPeminjaman($id)  
    {  
        $peminjaman = Peminjaman::find($id);  
        if ($peminjaman) {  
            $peminjaman->delete();  
            return response()->json(['success' => true]);  
        }  
        return response()->json(['success' => false]);  
    }  
  

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
