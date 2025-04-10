<?php

namespace App\Http\Controllers;

use App\Models\Buku;  
use App\Models\Kategori;  
use App\Models\Peminjaman;  
use App\Models\User;  
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller  
{  
    public function dashboard(Request $request)  
    {  
        

        $totalBuku = Buku::count();  
        $totalPending = Peminjaman::count();  
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
            'totalPending' => $totalPending,   
            'totalUser' => $totalUser,  
            'peminjamans' => $peminjamans,
            'users' => $users,
            'kategoris' =>$kategoris,
            'bukus' => $bukus,
        ]);  
    }  

    public function getData()
    {
        // Ambil data peminjaman per bulan
        $data = Peminjaman::selectRaw('MONTH(tanggal_pinjam) as month')
            ->selectRaw('COUNT(*) as total') // Total peminjaman
            ->selectRaw('SUM(CASE WHEN status = "pending" THEN 1 ELSE 0 END) as pending')
            ->selectRaw('SUM(CASE WHEN status = "disetujui" THEN 1 ELSE 0 END) as disetujui') // Jumlah status disetujui saat ini
            ->selectRaw('SUM(CASE WHEN status = "dikembalikan" THEN 1 ELSE 0 END) as dikembalikan') // Jumlah status dikembalikan
            ->selectRaw('SUM(CASE WHEN status = "denda" THEN 1 ELSE 0 END) as denda') // Jumlah status denda
            ->selectRaw('SUM(CASE WHEN status IN ("disetujui", "dikembalikan", "denda") THEN 1 ELSE 0 END) as total_pernah_dipinjam') // Total pernah disetujui
            ->whereYear('tanggal_pinjam', Carbon::now()->year) // Filter tahun saat ini
            ->groupBy('month')
            ->orderBy('month')
            ->get();

            $monthlyData = [];
            for ($i = 1; $i <= 12; $i++) {
                $monthlyData[$i] = [
                    'pending' => 0,
                    'disetujui' => 0,
                    'dikembalikan' => 0,
                    'denda' => 0
                ];
            }
        
            // Isi data dari hasil query
            foreach ($data as $item) {
                $monthlyData[$item->month] = [
                    'pending' => $item->pending,
                    'disetujui' => $item->disetujui,
                    'dikembalikan' => $item->dikembalikan,
                    'denda' => $item->denda
                ];
            }
        
            // Siapkan data untuk chart
            $months = [];
            $totalPending = [];
            $totalDisetujui = [];
            $totalDikembalikan = [];
            $totalDenda = [];
        
            foreach ($monthlyData as $month => $values) {
                $months[] = Carbon::create()->month($month)->format('M'); // Nama bulan singkat (Jan, Feb, dst)
                $totalPending[] = $values['pending'];
                $totalDisetujui[] = $values['disetujui'];
                $totalDikembalikan[] = $values['dikembalikan'];
                $totalDenda[] = $values['denda'];
            }
        
            // Kirim data sebagai JSON
            return response()->json([
                'months' => $months,
                'totalPending' => $totalPending,
                'totalDisetujui' => $totalDisetujui,
                'totalDikembalikan' => $totalDikembalikan,
                'totalDenda' => $totalDenda,
        ]);
    }
    public function getCategoryData()
    {
        // Ambil data jumlah buku berdasarkan kategori
        $data = DB::table('bukus')
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->select('kategoris.nama as kategori', DB::raw('COUNT(*) as total'))
            ->groupBy('kategoris.nama')
            ->orderByDesc('total') // Urutkan berdasarkan jumlah terbanyak
            ->get();

        // Format data untuk chart
        $categories = [];
        $totals = [];

        foreach ($data as $item) {
            $categories[] = $item->kategori; // Nama kategori
            $totals[] = $item->total; // Jumlah buku
        }

        // Kirim data sebagai JSON
        return response()->json([
            'categories' => $categories,
            'totals' => $totals,
        ]);
    }
    public function getMostReadBooks()
    {
        // Ambil data buku yang paling sering disetujui
        $data = Peminjaman::select('buku_id', DB::raw('COUNT(*) as total'))
            ->join('bukus', 'peminjaman.buku_id', '=', 'bukus.id')
            ->where('status', '!=', 'pending') // Hanya hitung status selain pending
            ->groupBy('buku_id')
            ->orderByDesc('total') // Urutkan berdasarkan jumlah peminjaman terbanyak
            ->limit(5) // Ambil 5 buku teratas
            ->get();

        // Format data untuk ditampilkan
        $bukus = [];
        foreach ($data as $item) {
            $buku = Buku::find($item->buku_id); // Ambil detail buku
            $bukus[] = [
                'judul' => $buku->judul,
                'foto' => asset('storage/' . $buku->foto),
                'penulis' => $buku->penulis,
                'total_pinjam' => $item->total,
            ];
        }

        // Kirim data sebagai JSON
        return response()->json($bukus);
    }

}
