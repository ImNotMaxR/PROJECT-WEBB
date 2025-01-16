@extends('master.master')

@section('content')
<div class="container">  
    <h1>Tambah Kategori</h1>  
    <form action="{{ route('kategori.store') }}" method="POST">  
        @csrf  
        <div class="form-group">  
            <label for="nama">Nama</label>  
            <input type="text" name="nama" class="form-control" required>  
        </div>  
        <div class="form-group">  
            <label for="deskripsi">Deskripsi</label>  
            <textarea name="deskripsi" class="form-control"></textarea>  
        </div>  
        <button type="submit" class="btn btn-primary">Simpan</button>  
    </form>  
</div>  
@endsection  
