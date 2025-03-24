@extends('master.master')

@section('content')
    <div class="container mt-5">

        <div>
            @if (@session()->has('message'))
       
       <!--begin::Alert-->
<div class="alert alert-dismissible bg-primary d-flex flex-column flex-sm-row p-5 mb-10">
    <!--begin::Icon-->
    <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
        <!--begin::Title-->
        <h4 class="mb-2 light"></h4>

            {{session()->get('message')}}

                    <!--end::Title-->

        <!--begin::Content-->
        <span></span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->
            @endif
        </div>
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
                        <p><strong>Genre Buku:</strong> {{ $buku->genre }}</p>
                        <p><strong>Kategori:</strong> {{ $buku->kategori->nama }}</p>
                        <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                        <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                        <p><strong>Stok:</strong> {{ $buku->stok }}</p>
                        <a href="{{ route('home') }}" class="btn btn-secondary mt-7 ">Kembali ke Daftar Buku</a>

                        <a href="{{ route('pinjam.buku', ['id' => $buku->id]) }}" class="btn btn-primary mt-7">Pinjam Buku</a>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
