<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Http\Request;  
use App\Models\Buku;  
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;   
  
class LandingController extends Controller  
{  


        // Display all books on the landing page with optional search functionality    
        public function index(Request $request)
        {
            $search = $request->input('search');
        
            // Ambil hanya 8 buku terbaru
            $bukus = Buku::when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', "%$search%");
            })->orderBy('tahun_terbit', 'desc') // Urutkan berdasarkan waktu pembuatan terbaru
              ->take(8) // Ambil maksimal 8 buku
              ->get();
        
            // Hitung total buku untuk menentukan apakah tombol "Lihat Semua Buku" ditampilkan
            $totalBuku = Buku::count();
         // Cek apakah user baru registrasi dan belum menyelesaikan onboarding
          $Onboarding = false;
          if (Auth::check()) {
         $user = Auth::user();
         $Onboarding = !$user->onboarding;
    }
    
            return view('index', compact('bukus', 'totalBuku','Onboarding'));
        }
        
        
    /**  
     * Display a listing of the resource.  
     */  
    /**  
     * Show the form for creating a new resource.  
     */  
    public function create()  
    {  
        //  
    }  
  
    /**  
     * Store a newly created resource in storage.  
     */  
    public function store(Request $request)  
    {  
        //  
    }  
  
    /**  
     * Display the specified resource.  
     */  
    public function show(string $id)  
    {  
        //  
    }  
  
    /**  
     * Show the form for editing the specified resource.  
     */  
    public function edit(string $id)  
    {  
        //  
    }  
  
    /**  
     * Update the specified resource in storage.  
     */  
    public function update(Request $request, string $id)  
    {  
        //  
    }  
  
    /**  
     * Remove the specified resource from storage.  
     */  
    public function destroy(string $id)  
    {  
        //  
    }  
}  
