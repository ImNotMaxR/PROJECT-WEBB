<?php    
    
namespace App\Http\Controllers;    
    
use App\Models\Buku;    
use App\Models\Kategori;    
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Storage;    
use Yajra\DataTables\DataTables;  
use Illuminate\Support\Facades\Auth;    
use App\Models\Peminjaman;    
use Carbon\Carbon;
use App\Models\User;    
  
class BukuController extends Controller    
{   
  
    // In Buku.php model    
    public function kategori()    
    {    
        return $this->belongsTo(Kategori::class, 'kategori_id');    
    }    
  
    // Display the dashboard with paginated books    
    public function dashboard()    
    {    
        $bk = Buku::with('kategori')->orderBy('id', 'DESC')->paginate(5);    
        return view('admin.dashboard', compact('bk'));    
    }    
    

    // Show a single book by ID    
    public function show($id)    
    {    
        $buku = Buku::findOrFail($id); // Fetch a single book by ID      
        return view('buku.show', compact('buku'));    
    }    
    
    // Show the form to create a new book    
    public function create()
    {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }
  
    public function pinjam($id)      
    {      
        $data = Buku::find($id);      
        $buku_id = $id;      
        $stok = $data->stok;
        
        // Mendapatkan jumlah buku yang diminta
        $jumlah_buku = request('jumlah_buku', 1);
        
        // Validasi jumlah buku
        if (!is_numeric($jumlah_buku) || $jumlah_buku < 1) {
            $jumlah_buku = 1;
        }
        
        // Konversi ke integer
        $jumlah_buku = (int) $jumlah_buku;
        
        // Cek stok mencukupi
        if ($stok >= $jumlah_buku) {      
            if (Auth::id()) {      
                $user_id = Auth::user()->id;      
        
                $pinjam = new Peminjaman;      
                $pinjam->buku_id = $buku_id;      
                $pinjam->user_id = $user_id;      
                $pinjam->jumlah_buku = $jumlah_buku; // Simpan jumlah buku
        
                // Set the tanggal_pinjam to the current date      
                $pinjam->tanggal_pinjam = now();
        
                // Set tanggal_kembali to 3 days after tanggal_pinjam    
                $pinjam->tanggal_kembali = now()->addDays(3);
        
                $pinjam->save();      
        
                return redirect()->back()->with('success', "Pesan Peminjaman buku tersebut dengan jumlah $jumlah_buku sudah dikirim ke Admin");      
            } else {      
                return redirect('/login');       
            }      
        } else {      
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi untuk jumlah yang diminta');      
        }      
    } 

    // Display paginated books for the dashboard    
    public function index(Request $request)    
    {    
        $kategoris = Kategori::all();
        $totalBuku = Buku::count();  
        $query = Buku::with('kategori')->orderBy('id', 'DESC'); 
        
        // Ambil parameter pencarian dari request
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

        // Ambil hasil dengan pagination
        $buku = $query->paginate(4)->appends($request->except('page'));
        $filteredbukusCount = $buku->total(); // Ambil jumlah hasil pencarian

        return view('buku.index', [
            'buku' => $buku,
            'totalBuku' => $totalBuku,
            'filteredbukusCount' => $filteredbukusCount,
            'kategoris' => $kategoris
        ]);
    }
    
    
    // Store a new book in the database    
    public function store(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required|max:100',
            'genre' => 'required|string',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|exists:kategoris,id', // Memastikan kategori ada di DB
            'stok' => 'required|integer|min:1'
        ]);
        

        $genreArray = json_decode($request->genre, true); // Ubah JSON menjadi array PHP
        $genreString = implode(', ', array_column($genreArray, 'value')); // Ambil nilai dan gabungkan dengan koma    
        $foto = $request->file('foto');      
        $foto->storeAs('public/buku', $foto->hashName());      
      
        Buku::create([      
            'foto' => 'buku/' . $foto->hashName(),      
            'judul' => $request->judul,      
            'deskripsi' => $request->deskripsi,     
            'genre' => $genreString, // Simpan sebagai string
            'penulis' => $request->penulis,      
            'penerbit' => $request->penerbit,      
            'tahun_terbit' => $request->tahun_terbit,      
            'kategori_id' => $request->kategori_id,      
            'stok' => $request->stok
        ]);      
          
        return redirect()->route('buku.index')->with('success', 'Data berhasil ditambahkan');      
    }    
    

      
    // Show the form to edit an existing book    
    public function edit($id)    
    {    
        $buku = Buku::find($id); 
        $kategoris = Kategori::all();    
        return view('buku.edit', compact('buku', 'kategoris'));    
    }  
    
    // Update an existing book in the database    
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required|string',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|date',
            'kategori_id' => 'required',
            'stok' => 'required|integer'
        ]);
    
        $bk = Buku::find($id);
    
        // Konversi genre dari JSON string ke array
        $genreArray = json_decode($request->genre, true);
        $genreString = implode(', ', array_column($genreArray, 'value')); // Ubah ke format string
    
        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            Storage::delete('public/' . $bk->foto);
            $foto->storeAs('public/buku', $foto->hashName());
    
            $bk->update([
                'foto' => 'buku/' . $foto->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'genre' => $genreString, // Simpan sebagai string
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'kategori_id' => $request->kategori_id,
                'stok' => $request->stok
            ]);
        } else {
            $bk->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'genre' => $genreString, // Simpan sebagai string
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'kategori_id' => $request->kategori_id,
                'stok' => $request->stok
            ]);
        }
    
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }
    
    // Delete a book from the database    
    public function destroy($id)    
    {    
        $bk = Buku::find($id);    
        Storage::delete('public/' . $bk->foto);    
        $bk->delete();    
    
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');    
    }    
}    
