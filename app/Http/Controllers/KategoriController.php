<?php  
  
namespace App\Http\Controllers;  
  
use App\Models\Kategori;  
use Illuminate\Http\Request;  
  
class KategoriController extends Controller  
{  
    public function index()  
    {  
        return view('kategori.index'); // Mengembalikan view index  
    }  
  
    public function create()  
    {  
        return view('kategori.create'); // Mengembalikan view create  
    }  
  
    public function store(Request $request)  
    {  
        $request->validate([  
            'nama' => 'required',  
            'deskripsi' => 'nullable|string',  
        ]);  
  
        Kategori::create($request->all());  
  
        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');  
    }  
  
    public function edit($id)  
    {  
        $kategori = Kategori::findOrFail($id);  
        return response()->json($kategori); // Mengembalikan data kategori dalam format JSON  
    }  
  
    public function update(Request $request, $id)  
    {  
        $request->validate([  
            'nama' => 'required',  
            'deskripsi' => 'nullable|string',  
        ]);  
  
        $kategori = Kategori::findOrFail($id);  
        $kategori->update($request->only(['nama', 'deskripsi']));  
  
        return response()->json(['success' => 'Kategori updated successfully.']);  
    }  
  
    public function destroy($id)  
    {  
        $kategori = Kategori::findOrFail($id);  
        $kategori->delete();  
  
        return response()->json(['success' => 'Kategori deleted successfully.']);  
    }  
  
    public function getKategoris()  
    {  
        $kategoris = Kategori::query();  
        return datatables()->of($kategoris)  
            ->addIndexColumn()  
            ->addColumn('action', function ($kategori) {  
                return '  
                    <button class="btn btn-primary edit-kategori"   
                            data-id="' . $kategori->id . '"   
                            data-nama="' . $kategori->nama . '"   
                            data-deskripsi="' . $kategori->deskripsi . '"   
                            data-bs-toggle="modal"   
                            data-bs-target="#Category">Edit</button>  
                    <button class="btn btn-danger delete-kategori" data-id="' . $kategori->id . '">Hapus</button>  
                ';  
            })  
            ->make(true);  
    }  
}  
