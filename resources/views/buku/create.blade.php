@extends('master.master')

@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

            <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::Form-->
                <form id="kt_ecommerce_add_product_form" action="{{ route('buku.store') }}" method="POST"
                    class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                    enctype="multipart/form-data">
                    @csrf

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
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image.png') }}'); 
                                    } 
                                    [data-bs-theme="dark"] .image-input-placeholder { 
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.png') }}'); 
                                    }
                                </style>
                                <!--end::Image input placeholder-->

                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-200px h-300px"></div>
                                    <!--end::Preview existing avatar-->

                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        aria-label="Change avatar" data-bs-original-title="Change avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="foto" accept=".png, .jpg, .jpeg">


                                        <!--end::Inputs-->
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
                                    Hanya file foto *.png, *.jpg dan *.jpeg yang diterima dengan ukuran 2:3</div>
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
                                    <label class="form-label">Masukan Genre</label>
                                    <input class="form-control form-control-solid" value="" id="kt_tagify_6" name="genre"/>
                                    <div class="text-muted fs-7">Pilih genre untuk buku ini.</div>
                                    @error('genre')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>         
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Kategori</h2>
                                </div>
                            </div>

                            <!--begin::Card body-->
                            <div class="card-body pt-0" data-select2-id="select2-data-130-az4i">
                                <!--begin::Select2-->
                                <label class="form-label d-block">Kategori Buku</label>
                                <select name="kategori_id" class="form-select mb-2"  data-control="select2" 
                                    data-placeholder="Pilih kategori" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach

                                </select>
                                @error('id_kategori')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="text-muted fs-7 mb-5">Pilih kategori untuk buku ini.</div>
                                <a href="{{ route('kategori.index') }}" class="btn btn-light-primary btn-sm mb-4">
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
                                    value="{{ old('stok') }}" placeholder="Masukkan jumlah stok">
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
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Judul Buku</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul Buku"
                                        value="">

                                    @error('judul')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <!--end::Input-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Masukan Judul Buku.</div>
                                    <!--end::Description-->
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label required">Deskripsi Buku</label>
                                    <textarea class="form-control" data-kt-autosize="true" name="deskripsi"
                                    placeholder="Masukan deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Deskripsi Buku.</div>
                                    <!--end::Description-->
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
                                        <!--begin::Label-->
                                        <label class="required form-label">Penulis</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <div class="d-flex gap-3">
                                            <input type="text" name="penulis" class="form-control mb-2"
                                                placeholder="Penulis" value="">

                                        </div>
                                        @error("penulis")
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <!--end::Input-->

                                        <div class="mb-10 fv-row fv-plugins-icon-container">
                                            <div class="my-10"></div>
                                            <!--begin::Label-->
                                            <label class="required form-label">Penerbit</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <div class="d-flex gap-3">
                                                <input type="text" name="penerbit" class="form-control mb-2"
                                                    placeholder="Penerbit" value="">

                                            </div>
                                            @error("penerbit")
                                            <div class="text-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Tahun </h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="form-label d-block">Tahun Terbit</label>
                                        <!--end::Label-->

                                        <input type="number" name="tahun_terbit" id="tahun_terbit"
                                            class="form-control mb-2" min="1900" max="{{ date('Y') }}"
                                            placeholder="Masukkan Tahun Terbit" value="{{ old('tahun_terbit') }}">


                                        @error('tahun_terbit')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Tahun Terbit Buku.</div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="d-flex justify-content-end">
                            <a href="{{ route('buku.index') }}" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">
                                Cancel
                            </a>
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Save Changes
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $('#tahun_terbit').flatpickr({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 12)
    }, function (start, end, label) {
        var years = moment().diff(start, "years");
        alert("You are " + years + " years old!");
    });

</script>

<script>
    var hostUrl = "assets/";

</script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

<script>
// The DOM elements you wish to replace with Tagify
var input = document.querySelector("#kt_tagify_6");

// Initialize Tagify script on the above inputs
new Tagify(input, {
    whitelist: [  "Action", "Adventure", "Biography", "Business", "Children", "Classics", 
    "Comics", "Contemporary", "Cookbooks", "Crime", "Dystopian", "Education",
    "Fantasy", "Fiction", "Graphic Novels", "Historical", "History", "Horror", 
    "Humor", "LGBTQ+", "Manga", "Memoir", "Motivational", "Music", "Mystery", 
    "Non-Fiction", "Paranormal", "Philosophy", "Poetry", "Psychology", "Religion", 
    "Romance", "Science", "Science Fiction", "Self-Help", "Short Stories", "Spirituality", 
    "Sports", "Supernatural", "Suspense", "Thriller", "Travel", "True Crime", "Western", "Young Adult"],
    maxTags: 10,
    dropdown: {
        maxItems: 20,           // <- mixumum allowed rendered suggestions
        classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
        enabled: 0,             // <- show suggestions on focus
        closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
    }
});
</script>
@endsection


