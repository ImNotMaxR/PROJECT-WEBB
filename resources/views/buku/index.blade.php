@extends('master.master')        
  
@section('content')       
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>  
  
<div class="container">    
    <div class="row">    
        <!-- Profile Details Section -->    
        <div class="row">     
            <div class="py-12">        
                <div class="max-w-7xl mx-auto sm:px-10 lg:px-8">        
                    <div class="card">        
                        <div class="card-header border-0 d-flex justify-content-between align-items-center">      
                            <h3 class="card-title">CRUD BUKU</h3>      
                            <div>    
                                <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>    
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kelola Kategori</a> <!-- Tombol untuk Kategori -->    
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
                                        <th>Foto</th>        
                                        <th>Judul</th>        
                                        <th>Deskripsi</th>        
                                        <th>Penulis</th>        
                                        <th>Penerbit</th>        
                                        <th>Tahun</th>        
                                        <th>Kategori</th>        
                                        <th>Stok</th>        
                                        <th>Aksi</th>        
                                    </tr>        
                                </thead>        
                                <tbody>        
                                    @foreach ($bk as $item)        
                                        <tr>        
                                            <td>{{ $loop->iteration }}</td>        
                                            <td><img src="{{ Storage::url($item->foto) }}" width="50px" alt="Foto Buku"></td>        
                                            <td>{{ $item->judul }}</td>        
                                            <td>{{ $item->deskripsi }}</td>        
                                            <td>{{ $item->penulis }}</td>        
                                            <td>{{ $item->penerbit }}</td>        
                                            <td>{{ $item->tahun_terbit }}</td>        
                                            <td>{{ $item->kategori->nama }}</td>        
                                            <td>{{ $item->stok }}</td>        
                                            <td>        
                                                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>        
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $item->id }}">HAPUS</button>        
                                            </td>        
                                        </tr>        
                                    @endforeach        
                                </tbody>        
                            </table>        
                            {{ $bk->links() }}        
                        </div>        
                    </div>        
                </div>        
            </div>        
        </div>        
    </div>        
  
    <!-- Modal Konfirmasi Hapus -->  
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">  
        <div class="modal-dialog" role="document">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                    </button>  
                </div>  
                <div class="modal-body">  
                    Apakah Anda yakin ingin menghapus buku ini?  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>  
                    <form id="deleteForm" action="" method="POST" style="display:inline;">  
                        @csrf  
                        @method('DELETE')  
                        <button type="submit" class="btn btn-danger">Hapus</button>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
  
    <script>  
        $('#deleteModal').on('show.bs.modal', function (event) {  
            var button = $(event.relatedTarget); // Tombol yang memicu modal  
            var id = button.data('id'); // Ambil data-id dari tombol  
            var action = '{{ route("buku.destroy", ":id") }}'; // Ambil route destroy  
            action = action.replace(':id', id); // Ganti :id dengan id yang sesuai  
            $('#deleteForm').attr('action', action); // Set action form  
        });  
    </script>  
@endsection        
