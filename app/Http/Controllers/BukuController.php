<?php    
    
namespace App\Http\Controllers;    
    
use App\Models\Buku;    
use App\Models\Kategori;    
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Storage;    
use Yajra\DataTables\DataTables;  
use Illuminate\Support\Facades\Auth;    
use App\Models\Peminjaman;    
use App\Models\User;    
  
class BukuController extends Controller    
{   
    public function datatables()    
    {    
        $bukus = Buku::with('kategori')    
            ->select('id', 'foto', 'judul', 'deskripsi', 'penulis', 'penerbit', 'tahun_terbit', 'kategori_id', 'stok')    
            ->get();    
      
        return DataTables::of($bukus)    
            ->addIndexColumn()    
            ->addColumn('foto', function ($row) {    
                // Check if the photo exists  
                if ($row->foto) {  
                    return '<img src="' . Storage::url($row->foto) . '" width="50px" alt="Foto Buku">';    
                }  
                return 'No Image'; // Fallback if no photo exists  
            })    
            ->addColumn('aksi', function ($row) {    
                $id = $row->id;    
                return '    
                    <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="' . route('buku.edit', $id) . '">    
                        <i class="fa fa-pencil"></i>    
                    </a>    
                    <a class="btn btn-sm btn-danger btn-icon delete-buku" data-id="' . $id . '" href="' . route('buku.destroy', $id) . '">    
                        <i class="fa fa-trash"></i>    
                    </a>    
                ';    
            })    
            ->addColumn('kategori', function ($row) {    
                return $row->kategori ? $row->kategori->nama : 'N/A';    
            })    
            ->rawColumns(['foto', 'aksi'])    
            ->toJson();    
    }  
  
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
        
        if ($stok >= '1') {      
            if (Auth::id()) {      
                $user_id = Auth::user()->id;      
        
                $pinjam = new Peminjaman;      
                $pinjam->buku_id = $buku_id;      
                $pinjam->user_id = $user_id;      
        
                // Set the tanggal_pinjam to the current date      
                $pinjam->tanggal_pinjam = now(); // or use Carbon::now() if you have Carbon imported      
        
                // Set tanggal_kembali to 3 days after tanggal_pinjam    
                $pinjam->tanggal_kembali = now()->addDays(3); // or use Carbon::now()->addDays(3)    
        
                $pinjam->save();      
        
                return redirect()->back()->with('message', 'Pesan Peminjaman Sudah Dikirim Ke Admin Untuk Meminjam Buku Ini');      
            } else {      
                return redirect('/login');       
            }      
        } else {      
            return redirect()->back()->with('message', 'BUKU NYA ABIS BRO');      
        }      
    }      
  
    // Request pinjam buku  
    public function pinjam_request()  
    {  
        $data = Peminjaman::with(['user', 'buku'])->get(); // Eager load user and buku relationships  
        return view('buku.peminjaman', compact('data'));  
    }  
  
   // ** New Method to Update Peminjaman Status **    
public function updateStatus(Request $request)    
{    
    $request->validate([    
        'id' => 'required|exists:peminjaman,id',    
        'status' => 'required|in:pending,disetujui,dikembalikan,denda',    
    ]);    
  
    $peminjaman = Peminjaman::find($request->id);    
  
    // Update stock based on status  
    if ($request->status == 'disetujui') {  
        // Decrease stock when approved  
        $peminjaman->buku->decrement('stok');  
    } elseif ($request->status == 'dikembalikan') {  
        // Increase stock when returned  
        $peminjaman->buku->increment('stok');  
    }  
  
    $peminjaman->status = $request->status;    
    $peminjaman->save();    
  
    return response()->json(['success' => true]);    
}  

  
    // ** New Method to Delete Peminjaman **  
    public function destroyPeminjaman($id)  
    {  
        $peminjaman = Peminjaman::find($id);  
        if ($peminjaman) {  
            $peminjaman->delete();  
            return response()->json(['success' => true]);  
        }  
        return response()->json(['success' => false]);  
    }  
  
    // Display paginated books for the dashboard    
    public function index()    
    {    
        $totalBuku = Buku::count();  
  
        // Siapkan data untuk view    
        $buku = Buku::with('kategori')->orderBy('id', 'DESC')->paginate(5); 
        
        return view('buku.index', compact('buku', 'totalBuku'));    
    }    
    
    // Store a new book in the database    
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required|max:100',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|exists:kategoris,id', // Memastikan kategori ada di DB
            'stok' => 'required|integer|min:1'
        ]);
        

      
        $foto = $request->file('foto');      
        $foto->storeAs('public/buku', $foto->hashName());      
      
        Buku::create([      
            'foto' => 'buku/' . $foto->hashName(),      
            'judul' => $request->judul,      
            'deskripsi' => $request->deskripsi,      
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
            'penulis' => 'required',    
            'penerbit' => 'required',    
            'tahun_terbit' => 'required|date',    
            'kategori_id' => 'required',    
            'stok' => 'required|integer'    
        ]);    
    
        $bk = Buku::find($id);    
    
        if ($request->hasFile('foto')) {    
            $foto = $request->file('foto');    
            Storage::delete('public/' . $bk->foto);    
            $foto->storeAs('public/buku', $foto->hashName());    
    
            $bk->update([    
                'foto' => 'buku/' . $foto->hashName(),    
                'judul' => $request->judul,    
                'deskripsi' => $request->deskripsi,    
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
