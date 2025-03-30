<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;  
use App\Models\Perpanjangan;  
use Illuminate\Http\Request;
use Carbon\Carbon;

class PerpanjanganController extends Controller
{
    // Menyimpan pengajuan perpanjangan
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'alasan' => 'required|string',
            'jumlah_hari' => 'required|integer|min:1',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        $perpanjangan = new Perpanjangan();
        $perpanjangan->user_id = auth()->id();
        $perpanjangan->peminjaman_id = $peminjaman->id;
        $perpanjangan->alasan = $request->alasan;
        $perpanjangan->jumlah_hari = $request->jumlah_hari;
        $perpanjangan->status = 'pending';
        $perpanjangan->save();

        return redirect()->back()->with('success', 'Perpanjangan berhasil diajukan');
    }

    // Menampilkan daftar perpanjangan (opsional untuk admin)
    public function index()
    {
        $data = Perpanjangan::count();  
        $perpanjangan = Perpanjangan::with('peminjaman')->get();
        return view('perpanjangan.index', compact('perpanjangan', 'data'));
    }

    // Fungsi menyetujui perpanjangan
    public function setujui(Request $request)
    {
        $perpanjangan = Perpanjangan::findOrFail($request->id);
    
        if ($perpanjangan->status !== 'pending') {
            return response()->json(['success' => false, 'message' => 'Perpanjangan sudah diproses']);
        }
    
        // Update status perpanjangan
        $perpanjangan->status = 'disetujui';
        $perpanjangan->save();
    
        // Update tanggal_kembali di peminjaman
        $peminjaman = $perpanjangan->peminjaman;
        $tanggal_kembali = Carbon::parse($peminjaman->tanggal_kembali);
        $tanggal_kembali->addDays($perpanjangan->jumlah_hari);
        $peminjaman->tanggal_kembali = $tanggal_kembali;
        $peminjaman->save();
    
        return response()->json(['success' => true, 'message' => 'Perpanjangan disetujui dan tanggal kembali diperbarui']);
    }

    public function tolak(Request $request) {
        $perpanjangan = Perpanjangan::findOrFail($request->id);
        if ($perpanjangan->status !== 'pending') {
            return response()->json(['error' => 'Perpanjangan sudah diproses'], 400);
        }
        $perpanjangan->status = 'ditolak';
        $perpanjangan->save();
        return response()->json(['success' => true, 'message' => 'Perpanjangan ditolak']);
    }
    
    public function hapus($id) {
        $perpanjangan = Perpanjangan::findOrFail($id);
        $perpanjangan->delete();
        return response()->json(['success' => true, 'message' => 'Perpanjangan dihapus']);
    }
    
    
}
