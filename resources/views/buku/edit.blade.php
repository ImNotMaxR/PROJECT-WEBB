@extends('master.master')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

            <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::Form-->
                <form id="kt_ecommerce_edit_product_form" action="{{ route('buku.update', $buku->id) }}" method="POST"
                    class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                        data-select2-id="select2-data-132-h8y1">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>foto Buku</h2>
                                </div>
                                <!--end::Card title-->
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

                                <div class="image-input image-input-outline @if(!$buku->foto) image-input-empty image-input-placeholder @endif" 
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-200px h-300px"
                                        @if($buku->foto) 
                                        style="background-image: url('{{ asset('storage/' . $buku->foto) }}')" 
                                        @endif></div>
                                    <!--end::Preview existing avatar-->

                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        aria-label="Change avatar" data-bs-original-title="Change avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <input type="file" name="foto" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                    <!--end::Cancel-->

                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">
                                    Hanya file foto *.png, *.jpg dan *.jpeg yang diterima</div>
                                @error('foto')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>

                        
                        <!-- Category Card -->
                        <div class="card card-flush">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Genre</h2>
                                </div>
                            </div>

                            <!--begin::Card body-->
                            <div class="card-body pt-0" data-select2-id="select2-data-130-az4i">
                                <!--begin::Select2-->
                                <div class="mb-2">
                                    <label class="form-label">Masukkan Genre</label>
                                    <input class="form-control form-control-solid" 
                                           value="{{ old('genre') }}" 
                                           id="kt_tagify_6" 
                                           name="genre"/>

                                    <div class="text-muted fs-7">Pilih genre untuk buku ini.</div>
                                    @error('genre')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>         
                            </div>
                        </div>

                        <!-- Category Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Kategori</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0" data-select2-id="select2-data-130-az4i">
                                <label class="form-label d-block">Kategori Buku</label>
                                <select name="kategori_id" class="form-select mb-2" data-control="select2" 
                                    data-placeholder="Pilih kategori" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" 
                                        {{ $buku->kategori_id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
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
                                <input type="number" name="stok"
                                    class="form-control form-control-lg form-control-solid @error('stok') is-invalid @enderror"
                                    value="{{ old('stok', $buku->stok) }}" 
                                    placeholder="Masukkan jumlah stok">
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
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <label class="required form-label">Judul Buku</label>
                                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul Buku"
                                        value="{{ old('judul', $buku->judul) }}">
                                    @error('judul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="text-muted fs-7">Masukan Judul Buku.</div>
                                </div>
                                
                                <div>
                                    <label class="form-label required">Deskripsi Buku</label>
                                    <textarea name="deskripsi" class="form-control" rows="4"
                                        placeholder="Masukan deskripsi" id="deskripsi">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="text-muted fs-7">Deskripsi Buku.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Meta Options Card -->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Informasi Buku Tambahan</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Penulis</label>
                                        <div class="d-flex gap-3">
                                            <input type="text" name="penulis" class="form-control mb-2"
                                                placeholder="Penulis" 
                                                value="{{ old('penulis', $buku->penulis) }}">
                                        </div>
                                        @error("penulis")
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Penerbit</label>
                                        <div class="d-flex gap-3">
                                            <input type="text" name="penerbit" class="form-control mb-2"
                                                placeholder="Penerbit" 
                                                value="{{ old('penerbit', $buku->penerbit) }}">
                                        </div>
                                        @error("penerbit")
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Tahun Terbit </h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="form-label d-block"></label>
                                        <input type="number" name="tahun_terbit" id="tahun_terbit"
                                            class="form-control mb-2" min="1900" max="{{ date('Y') }}"
                                            placeholder="Masukkan Tahun Terbit" 
                                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                                        @error('tahun_terbit')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="text-muted fs-7">Tahun Terbit Buku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('buku.index') }}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">
                                Cancel
                            </a>
                            <button type="submit" id="kt_ecommerce_edit_product_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Save Changes
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
        defaultDate: "{{ old('tahun_terbit', $buku->tahun_terbit) }}",
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 12)
    });
</script>

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var input = document.querySelector("#kt_tagify_6");
        
        // Pastikan genre lama dimuat
        var oldGenres = {!! json_encode(explode(', ', $buku->genre ?? '')) !!};

        var tagify = new Tagify(input, {
            whitelist: [  "Action", "Adventure", "Biography", "Business", "Children", "Classics", 
            "Comics", "Contemporary", "Cookbooks", "Crime", "Dystopian", "Education",
            "Fantasy", "Fiction", "Graphic Novels", "Historical", "History", "Horror", 
            "Humor", "LGBTQ+", "Manga", "Memoir", "Motivational", "Music", "Mystery", 
            "Non-Fiction", "Paranormal", "Philosophy", "Poetry", "Psychology", "Religion", 
            "Romance", "Science", "Science Fiction", "Self-Help", "Short Stories", "Spirituality", 
            "Sports", "Supernatural", "Suspense", "Thriller", "Travel", "True Crime", "Western", "Young Adult"],
            maxTags: 10,
            dropdown: {
                maxItems: 20,
                classname: "tagify__inline__suggestions",
                enabled: 0,
                closeOnSelect: false
            }
        });

        // Set nilai lama ke dalam Tagify
        tagify.addTags(oldGenres);
    });
</script>

@endsection