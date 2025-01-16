@extends('buku.master')

@section('content')
    <div class="container mt-5">
        <div class="py-12">    
        <div class="row">  
            <div class="col-md-12">  
                <div class="card mb-5 mb-xl-10">  
                    <div class="card-header border-0">  
                        <h3 class="card-title">Tambah Buku</h3>  
                    </div>  
                    <div class="collapse show">  
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" class="form">  
                            @csrf  
  
                            <div class="card-body">  
                                <!-- Judul Buku -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Judul Buku</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="text" name="judul" id="judul"  
                                            class="form-control form-control-lg form-control-solid @error('judul') is-invalid @enderror"  
                                            value="{{ old('judul') }}" required>  
                                        @error('judul')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- deskripsi -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Deskripsi</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="text" name="deskripsi" id="deskripsi"  
                                            class="form-control form-control-lg form-control-solid @error('deskripsi') is-invalid @enderror"  
                                            value="{{ old('deskripsi') }}" required>  
                                        @error('deskripsi')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Penulis -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Penulis</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="text" name="penulis" id="penulis"  
                                            class="form-control form-control-lg form-control-solid @error('penulis') is-invalid @enderror"  
                                            value="{{ old('penulis') }}" required>  
                                        @error('penulis')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Penerbit -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Penerbit</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="text" name="penerbit" id="penerbit"  
                                            class="form-control form-control-lg form-control-solid @error('penerbit') is-invalid @enderror"  
                                            value="{{ old('penerbit') }}" required>  
                                        @error('penerbit')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Tahun Terbit -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tahun Terbit</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="date" name="tahun_terbit" id="tahun_terbit"  
                                            class="form-control form-control-lg form-control-solid @error('tahun_terbit') is-invalid @enderror"  
                                            value="{{ old('tahun_terbit') }}" required>  
                                        @error('tahun_terbit')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Kategori Select -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategori</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <select name="kategori_id" id="kategori_id"  
                                            class="form-select form-select-lg form-select-solid @error('kategori_id') is-invalid @enderror"  
                                            required>  
                                            <option value="" disabled selected>Pilih Kategori</option>  
                                            @foreach ($kategoris as $kategori)  
                                                <option value="{{ $kategori->id }}"  
                                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>  
                                                    {{ $kategori->nama }}  
                                                </option>  
                                            @endforeach  
                                        </select>  
                                        @error('kategori_id')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Stok -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Stok</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="number" name="stok" id="stok"  
                                            class="form-control form-control-lg form-control-solid @error('stok') is-invalid @enderror"  
                                            value="{{ old('stok') }}" required>  
                                        @error('stok')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
  
                                <!-- Foto -->  
                                <div class="row mb-6">  
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Foto</label>  
                                    <div class="col-lg-8 fv-row">  
                                        <input type="file" name="foto" id="foto"  
                                            class="form-control form-control-lg form-control-solid @error('foto') is-invalid @enderror"  
                                            accept="image/*" required>  
                                        @error('foto')  
                                            <div class="text-danger mt-2">{{ $message }}</div>  
                                        @enderror  
                                    </div>  
                                </div>  
                            </div>  
  
                            <div class="card-footer d-flex justify-content-end py-6">  
                                <button type="submit" class="btn btn-primary">Simpan</button>  
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary ms-2">Kembali</a>  
                            </div>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
  
    <!-- Error Modal -->  
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                </div>  
                <div class="modal-body">  
                    @if ($errors->any())  
                        <ul>  
                            @foreach ($errors->all() as $error)  
                                <li>{{ $error }}</li>  
                            @endforeach  
                        </ul>  
                    @endif  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
                </div>  
            </div>  
        </div>  
    </div>  
  
    @if ($errors->any())  
        <script>  
            $(document).ready(function() {  
                $('#errorModal').modal('show');  
            });  
        </script>  
    @endif  
@endsection  
