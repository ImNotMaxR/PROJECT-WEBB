<?php  
  
namespace App\Http\Controllers;  
  
use App\Models\Buku;  
use App\Models\Kategori;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Storage;  
use Yajra\DataTables\DataTables;
  
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
  
    // Display all books on the landing page with optional search functionality  
    public function index(Request $request) // Combine both index methods  
    {  

        $search = $request->get('search'); // Get the search query from the request  
        $bukus = Buku::when($search, function ($query) use ($search) {  
            return $query->where('judul', 'like', '%' . $search . '%'); // Filter books by title  
        })->get(); // Fetch all books or filtered books based on search  
  
        return view('index', compact('bukus')); // Pass the books to the view  
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
        $kategoris = Kategori::all(); // Fetch all categories    
        return view('buku.create', compact('kategoris')); // Pass $kategoris to the view    
    }  
  
    // Display paginated books for the dashboard  
    public function crud()  
    {  
        $totalBuku = Buku::count();

        // Siapkan data untuk view
        $data['totalBuku'] = $totalBuku;

        return view('buku.index', $data);

        $bk = Buku::with('kategori')->orderBy('id', 'DESC')->paginate(5);  
        return view('buku.index', compact('bk'));  
    }  
  
    // Store a new book in the database  
    public function store(Request $request)    
    {    
        try {  
            $request->validate([    
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',    
                'judul' => 'required',    
                'deskripsi' => 'required',    
                'penulis' => 'required',    
                'penerbit' => 'required',    
                'tahun_terbit' => 'required|date',    
                'kategori_id' => 'required',    
                'stok' => 'required|integer'    
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
        } catch (\Exception $e) {  
            return redirect()->back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);  
        }  
    }  
    
    // Show the form to edit an existing book  
    public function edit($id)  
{  
    $buku = Buku::find($id);  // Ubah dari $bk menjadi $buku
    $kategori = Kategori::all();  
    return view('buku.edit', compact('buku', 'kategori'));  
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
