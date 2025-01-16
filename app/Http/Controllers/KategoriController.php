<?php  
  
  namespace App\Http\Controllers;  
  
  use App\Models\Kategori;  
  use Illuminate\Http\Request;  
    
  class KategoriController extends Controller  
  {  
      public function index()  
      {  
          $kategoris = Kategori::all();  
          return view('kategori.index', compact('kategoris'));  
      }  
    
      public function create()  
      {  
          return view('kategori.create');  
      }  
    
      public function store(Request $request)  
      {  
          $request->validate([  
              'name' => 'required',  
          ]);  
    
          Kategori::create($request->all());  
    
          return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');  
      }  
    
      public function edit($id)  
      {  
          $kategori = Kategori::findOrFail($id);  
          return view('kategori.edit', compact('kategori'));  
      }  
    
      public function update(Request $request, $id)  
      {  
          $request->validate([  
              'name' => 'required',  
          ]);  
    
          $kategori = Kategori::findOrFail($id);  
          $kategori->update($request->all());  
    
          return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');  
      }  
    
      public function destroy($id)  
      {  
          $kategori = Kategori::findOrFail($id);  
          $kategori->delete();  
    
          return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');  
      }  
  }  
  