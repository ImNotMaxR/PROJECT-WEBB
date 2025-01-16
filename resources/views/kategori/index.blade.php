@extends('master.master')        
  
@section('content')       
<script></script>    
<div class="container">    
    <div class="row">    
        <!-- Profile Details Section -->    
        <div class="row">     
            <div class="py-12">              
                    <div class="card">        
                        <div class="card-header border-0 d-flex justify-content-between align-items-center">      
                            <h3 class="card-title">CRUD KATEGORI</h3>      
                            <div>    
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>    
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kelola Buku</a> <!-- Tombol untuk Buku -->    
                            </div>    
                        </div>        
                        @if (session('success'))        
                            <div class="alert alert-success">        
                                {{ session('success') }}        
                            </div>        
                        @endif        
  
                        <div class="table-responsive">        
                            <table class="table table-striped table-bordered">        
                                <thead>        
                                    <tr>        
                                        <th>No.</th>        
                                        <th>Nama</th>        
                                        <th>Deskripsi</th>        
                                        <th>Aksi</th>        
                                    </tr>        
                                </thead>        
                                <tbody>        
                                    @foreach ($kategoris as $kategori)        
                                        <tr>        
                                            <td>{{ $loop->iteration }}</td>        
                                            <td>{{ $kategori->nama }}</td>        
                                            <td>{{ $kategori->deskripsi }}</td>        
                                            <td>        
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"        
                                                      action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">        
                                                    <a href="{{ route('kategori.edit', $kategori->id) }}"        
                                                       class="btn btn-sm btn-primary">EDIT</a>        
                                                    @csrf        
                                                    @method('DELETE')        
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>        
                                                </form>        
                                            </td>        
                                        </tr>        
                                    @endforeach        
                                </tbody>        
                            </table>        
                            {{ $kategoris->links() }}        
                        </div>        
                    </div>        
                </div>        
            </div>        
        </div>        
    </div>        
@endsection        
