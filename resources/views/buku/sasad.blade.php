@extends('master.master')

@section('content')
<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
            <div class="content flex-row-fluid" id="kt_content">
                    <form id="kt_ecommerce_add_product_form" action="{{ route('buku.store') }}" method="POST"
                        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!-- Cover Book Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Cover Buku</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder { 
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}'); 
                                    } 
                                    [data-bs-theme="dark"] .image-input-placeholder { 
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}'); 
                                    }
                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Masukan Cover">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file"  name="foto" id="foto"  
										accept="image/*" requiredaccept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="cover_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus cover">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">Masukkan gambar cover buku. Hanya file *.png, *.jpg dan *.jpeg yang diterima</div>
                                @error('foto')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Kategori</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <label class="form-label">Kategori Buku</label>
                                <select class="form-select mb-2" name="kategori_id" data-control="select2" 
                                    data-placeholder="Pilih kategori" data-allow-clear="true">
                                    <option></option>
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
                                <div class="text-muted fs-7 mb-7">Pilih kategori untuk buku ini.</div>
                                <a href="{{ route('kategori.index') }}" class="btn btn-light-primary btn-sm mb-10">
                                    <i class="ki-duotone ki-plus fs-2"></i>Tambah Kategori Baru
                                </a>
                            </div>
                        </div>

                        <!-- Stock Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Stok</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <input type="number" name="stok" class="form-control form-control-lg form-control-solid @error('stok') is-invalid @enderror"
                                    value="{{ old('stok') }}" placeholder="Masukkan jumlah stok" required>
                                @error('stok')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!-- Book Data Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Data Buku</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Nama Buku</label>
                                    <input type="text" name="nama" class="form-control mb-2 @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan nama buku" value="{{ old('nama') }}"  />
                                    @error('nama')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Masukkan nama lengkap buku.</div>
                                </div>

                                <div>
                                    <label class="form-label">Deskripsi</label>
                                    <div class="form-floating mb-7">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                            name="deskripsi" placeholder="Masukkan deskripsi buku" style="height: 100px">{{ old('deskripsi') }}</textarea>
                                        <label for="deskripsi" class="text-muted fs-5">Tulis deskripsi buku..</label>
                                        @error('deskripsi')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Meta Options Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Informasi Tambahan</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Penulis</label>
                                        <input type="text" name="penulis" class="form-control mb-2 @error('penulis') is-invalid @enderror"
                                            placeholder="Masukkan nama penulis" value="{{ old('penulis') }}" required />
                                        @error('penulis')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control mb-2 @error('penerbit') is-invalid @enderror"
                                            placeholder="Masukkan nama penerbit" value="{{ old('penerbit') }}" required />
                                        @error('penerbit')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Tahun Terbit</label>
                                        <input type="date" name="tahun_terbit" class="form-control mb-2 @error('tahun_terbit') is-invalid @enderror"
                                            value="{{ old('tahun_terbit') }}" required />
                                        @error('tahun_terbit')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('buku.index') }}" class="btn btn-light me-5">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Mohon tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
	$('#tahun_terbit').flatpickr({
		dateFormat: "Y",
	});
</script>

<script>
    var hostUrl = "assets/";
</script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
@endsection