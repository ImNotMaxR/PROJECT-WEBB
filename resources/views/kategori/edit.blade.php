@extends('master.master')  
  
@section('content')  
<div class="container">  
    <h1>Edit Kategori</h1>  
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">  
        @csrf  
        @method('PUT')  
        <div class="form-group">  
            <label for="nama">Nama</label>  
            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>  
        </div>  
        <div class="form-group">  
            <label for="deskripsi">Deskripsi</label>  
            <textarea name="deskripsi" class="form-control">{{ $kategori->deskripsi }}</textarea>  
        </div>  
        <button type="submit" class="btn btn-primary">Perbarui</button>  
    </form>  
</div>  
@endsection  
