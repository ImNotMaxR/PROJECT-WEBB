<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;  
use App\Models\Kategori;    
use Carbon\Carbon;

class KatalogController extends Controller
{
    public function index(Request $request)
{
    $totalbukus = Buku::count();
    $kategoris = Kategori::all();

    // Start with base query
    $query = Buku::query();

    // Get request parameters
    $search = $request->input('search');
    $genreSearch = $request->input('genre');
    $kategoriId = $request->input('kategori_id');
    $searchType = $request->input('type', 'has');
    $tahunTerbitRange = $request->input('tahun_terbit');

    // Filter berdasarkan Genre
    if (!empty($genreSearch)) {
        $genres = is_string($genreSearch) ? json_decode($genreSearch, true) : $genreSearch;
        if (is_array($genres)) {
            $genres = array_map(fn($g) => is_array($g) ? $g['value'] : $g, $genres);
        }
        $query->where(function ($q) use ($genres) {
            foreach ($genres as $genre) {
                if (!empty($genre)) {
                    $q->orWhere('genre', 'LIKE', "%$genre%");
                }
            }
        });
    }

    // Filter berdasarkan Kategori
    if (!empty($kategoriId)) {
        $query->where('kategori_id', $kategoriId);
    }

    // Filter berdasarkan "Cari Berdasarkan"
    if (!empty($search)) {
        switch ($searchType) {
            case 'judul':
                $query->where('judul', 'LIKE', "%$search%");
                break;
            case 'penulis':
                $query->where('penulis', 'LIKE', "%$search%");
                break;
            case 'penerbit':
                $query->where('penerbit', 'LIKE', "%$search%");
                break;
            case 'has':
            default:
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'LIKE', "%$search%")
                      ->orWhere('penulis', 'LIKE', "%$search%")
                      ->orWhere('penerbit', 'LIKE', "%$search%");
                });
                break;
        }
    }

    // Filter berdasarkan Tahun Terbit (Rentang Tanggal)
    if (!empty($tahunTerbitRange)) {
        $dates = explode(" to ", $tahunTerbitRange);
        if (count($dates) == 2) {
            $startDate = Carbon::parse($dates[0])->startOfDay();
            $endDate = Carbon::parse($dates[1])->endOfDay();
            $query->whereBetween('tahun_terbit', [$startDate, $endDate]);
        }
    }

    // Fetch results
    $bukus = $query->orderBy('judul', 'asc')
        ->paginate(8)
        ->appends($request->except('page'));
    $filteredbukusCount = $bukus->total(); // Ambil jumlah hasil pencarian

    return view('buku.katalog', [
        'bukus' => $bukus,
        'filteredbukusCount' => $filteredbukusCount,
        'totalbukus' => $totalbukus,
        'kategoris' => $kategoris
    ]);
}
}