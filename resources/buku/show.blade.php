@extends('buku.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <h3 class="card-title">Cover Image</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid rounded"
                            style="max-height: 300px; width: auto;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <h3 class="card-title">Book Details</h3>
                    </div>
                    <div class="card-body">
                        <h1 class="mb-4">{{ $buku->judul }}</h1>
                        <p><strong>Deskripsi:</strong> {{ $buku->deskripsi }}</p>
                        <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                        <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                        <p><strong>Stok:</strong> {{ $buku->stok }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Daftar Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
