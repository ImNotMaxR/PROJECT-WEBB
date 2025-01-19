<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalKategori = Kategori::count();

        // Siapkan data untuk view
        $data['totalKategori'] = $totalKategori;

        return view('kategori.index', $data);
    }

    public function datatables()
    {
        // Ambil data dari tabel 'kategoris'
        $kategoris = DB::table('kategoris')
            ->select('id', 'nama', 'deskripsi', 'created_at', 'updated_at')
            ->get();

        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $id = $row->id;
                $data = '

                <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="#">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-sm btn-danger btn-icon delete-kategori" data-id="' . $id . '" href="' . route('kategori.destroy', $id) . '">
                    <i class="fa fa-trash"></i>
                </a>
            ';

                return $data;
            })
            ->rawColumns(['aksi']) // Aktifkan kolom 'aksi' agar mendukung HTML
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
        ]);

        // Simpan data ke database
        Kategori::create([
            'nama' => $validatedData['nama_kategori'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama,' . $id, // Pastikan unique diperbarui sesuai ID
            'deskripsi' => 'nullable|string|max:500',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.string' => 'Nama kategori harus berupa teks.',
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
        ]);

        // Temukan data kategori
        $kategori = Kategori::findOrFail($id); // Temukan data berdasarkan ID

        // Update data
        $kategori->update([
            'nama' => $validatedData['nama_kategori'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'kategori tidak ditemukan.');
        }

        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil dihapus.');
    }
}
