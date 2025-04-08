@extends('master.master')
@section('title', 'Kelola Buku')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Container-->
            <div class="container-xxl d-flex flex-grow-1 flex-stack">
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row g-5 g-xl-12">
            <div class="col-xl-12">
                <div class="py-12">
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Kelola Buku</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Buku : {{ $totalBuku }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('buku.create') }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="ki-duotone ki-plus-square fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>Tambah Buku
                                    </button>
                                </a>
                            </div>
                            <!-- Form Pencarian -->
                            <div class="container py-6">
                                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                                    <!--begin::Container-->
                                    <div class="container-xxl-10" id="kt_content_container">
                                        <!--begin::Form-->
                                        <form action="{{ route('bukus.index') }}" method="GET">
                                            <!--begin::Card-->
                                            <div class="card mb-4">
                                                <!--begin::Card body-->
                                                <div class="card-body">
                                                    <!--begin::Compact form-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Input group-->
                                                        <div class="position-relative w-md-400px me-md-2">
                                                            <i
                                                                class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <input type="text" id="searchInput" name="search"
                                                                class="form-control form-control-solid ps-10"
                                                                placeholder="Cari judul, penulis, atau penerbit"
                                                                value="{{ request('search') }}">
                                                            <!-- Ikon Clear -->
                                                            <span id="clearSearch"
                                                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-2 me-2 d-none"
                                                                data-kt-search-element="clear">
                                                                <!-- SVG Icon (X) -->
                                                                <i class="ki-outline ki-cross fs-1"></i>
                                                            </span>
                                                        </div>

                                                        <!--end::Input group-->
                                                        <!--begin:Action-->
                                                        <div class="d-flex align-items-center">
                                                            <button type="submit"
                                                                class="btn btn-primary me-5">Search</button>
                                                            <a href="#" id="kt_horizontal_search_advanced_link"
                                                                class="btn btn-link"
                                                                data-bs-target="#kt_advanced_search_form">Advanced
                                                                Search</a>
                                                        </div>
                                                        <!--end:Action-->
                                                    </div>
                                                    <!--end::Compact form-->
                                                    <!--begin::Advance form-->
                                                    <div class="collapse" id="kt_advanced_search_form">
                                                        <!--begin::Separator-->
                                                        <div
                                                            class="separator separator-dashed border-primary mt-9 mb-6">
                                                        </div>
                                                        <!--end::Separator-->
                                                        <!--begin::Row-->
                                                        <div class="row g-8 mb-8">
                                                            <!--begin::Col-->
                                                            <div class="col-xxl-4">
                                                                <label
                                                                    class="fs-6 form-label fw-bold text-dark">Genre</label>
                                                                <input class="form-control form-control-solid"
                                                                    id="taglify_genres" name="genre" data-name="genre"
                                                                    value="{{ request('genre') }}" />
                                                                <div class="text-muted fs-7">Pilih genre untuk mencari
                                                                    buku</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xxl-5">
                                                                <!--begin::Row-->
                                                                <div class="row g-8">
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-10">
                                                                        <label
                                                                            class="fs-6 form-label fw-bold text-dark">Kategori</label>
                                                                        <!--begin::Select-->
                                                                        <div class="d-flex align-items-center">
                                                                            <select id="kategoriSelect"
                                                                                name="kategori_id"
                                                                                class="form-select form-select-solid flex-grow-1"
                                                                                data-control="select2"
                                                                                data-placeholder="Pilih kategori">
                                                                                <option></option>
                                                                                @foreach ($kategoris as $kategori)
                                                                                <option value="{{ $kategori->id }}"
                                                                                    {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                                                    {{ $kategori->nama }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!-- Tombol Clear -->
                                                                            <span id="clearKategori" class="ms-2"
                                                                                style="cursor: pointer; display: none;">
                                                                                <i class="ki-outline ki-cross fs-1"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="text-muted fs-7">Pilih Buku
                                                                            Berdasarkan Kategori</div>
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Row-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div class="row g-8">
                                                            <!--begin::Col-->
                                                            <div class="col-xxl-7">
                                                                <!--begin::Row-->
                                                                <div class="row g-8">
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6">
                                                                        <label
                                                                            class="fs-6 form-label fw-bold text-dark">Cari
                                                                            Berdasarkan</label>
                                                                        <!--begin::Radio group-->
                                                                        <div class="nav-group nav-group-fluid">
                                                                            <!--begin::Option-->
                                                                            <label>
                                                                                <input type="radio" class="btn-check"
                                                                                    name="type" value="has"
                                                                                    {{ request('type', 'has') == 'has' ? 'checked' : '' }} />
                                                                                <span
                                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Semua</span>
                                                                            </label>
                                                                            <!--end::Option-->
                                                                            <!--begin::Option-->
                                                                            <label>
                                                                                <input type="radio" class="btn-check"
                                                                                    name="type" value="judul"
                                                                                    {{ request('type') == 'judul' ? 'checked' : '' }} />
                                                                                <span
                                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Judul</span>
                                                                            </label>
                                                                            <!--end::Option-->
                                                                            <!--begin::Option-->
                                                                            <label>
                                                                                <input type="radio" class="btn-check"
                                                                                    name="type" value="penulis"
                                                                                    {{ request('type') == 'penulis' ? 'checked' : '' }} />
                                                                                <span
                                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Penulis</span>
                                                                            </label>
                                                                            <!--end::Option-->
                                                                            <!--begin::Option-->
                                                                            <label>
                                                                                <input type="radio" class="btn-check"
                                                                                    name="type" value="penerbit"
                                                                                    {{ request('type') == 'penerbit' ? 'checked' : '' }} />
                                                                                <span
                                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Penerbit</span>
                                                                            </label>
                                                                            <!--end::Option-->
                                                                        </div>
                                                                        <div class="text-muted fs-7">Pilih Buku
                                                                            Berdasarkan Pilihan</div>
                                                                        <!--end::Radio group-->
                                                                    </div>
                                                                    <!--end::Col-->

                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6">
                                                                        <label
                                                                            class="fs-6 form-label fw-bold text-dark">TahunTerbit</label>
                                                                        <input type="number" name="tahun_terbit"
                                                                            id="tahun_terbit"
                                                                            class="form-control form-control-solid"
                                                                            min="1900" max="{{ date('Y') }}"
                                                                            placeholder="Masukkan Tahun Terbit"
                                                                            value="{{ request('tahun_terbit') }}">
                                                                        <div class="text-muted fs-7">Pilih Buku
                                                                            Berdasarkan Jarak Waktu
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                    </div>
                                    <!--end::Advance form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            </form>
                            <!--end::Form-->

                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->


                        <!-- Toastr-->
                        <script>
                            $(document).ready(function () {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toastr-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };

                                @if(Session::has('success'))
                                toastr.success("{{ Session::get('success') }}", "Success");
                                @endif

                                @if(Session::has('error'))
                                toastr.error("{{ Session::get('error') }}", "Error");
                                @endif

                                @if(Session::has('info'))
                                toastr.info("{{ Session::get('info') }}", "Info");
                                @endif

                                @if(Session::has('warning'))
                                toastr.warning("{{ Session::get('warning') }}", "Warning");
                                @endif
                            });

                        </script>
                        <!-- Toastr-->



                        <!--begin::Card body-->
                        <div class="card-body pt-9 px-4 py-4">
                            <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
                                @foreach ($buku as $item)
                                <div class="col-md-6 mb-6">
                                    <div class="card shadow-sm h-100" style="margin-bottom: 15px; padding: 10px;">
                                        <!--begin::Row-->
                                        <div class="row gx-9 h-100">
                                            <!--begin::Col (Image)-->
                                            <div class="col-sm-6 mb-10 mb-sm-0 mt-6">
                                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-400 h-400 min-w-250px w-250px"
                                                    style="background-size: 100% 100%;background-image:url('{{ asset('storage/' . $item->foto) }}')">
                                                </div>
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col (Details)-->
                                            <div class="col-sm-6">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column h-100">
                                                    <!--begin::Header-->
                                                    <div class="mb-7">
                                                        <!--begin::Heading-->
                                                        <div class="d-flex flex-stack mb-6">
                                                            <!--begin::Title-->
                                                            <div class="flex-shrink-0 me-5">
                                                                <!-- Tanggal Upload Buku -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Tanggal
                                                                    Upload Buku</span>
                                                                <span
                                                                    class="text-gray-800 fs-7 fw-bold d-block lh-1 pb-1">
                                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                                </span>
                                                                <br>

                                                                <!-- Judul Buku -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Judul</span>
                                                                <span
                                                                    class="text-gray-800 fs-5 fw-bold text-wrap d-block">
                                                                    {{ $item->judul }}
                                                                </span>
                                                                <br>

                                                                <!-- Penulis -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Penulis</span>
                                                                <span
                                                                    class="fw-bold text-gray-800 fs-7 d-block">{{ $item->penulis }}</span>
                                                                <br>

                                                                <!-- Penerbit -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Penerbit</span>
                                                                <span
                                                                    class="fw-bold text-gray-800 fs-7 d-block">{{ $item->penerbit }}</span>
                                                                <br>

                                                                <!-- Genre -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Genre</span>
                                                                <span
                                                                    class="fw-bold text-gray-800 fs-7 d-block">{{ $item->genre }}</span>
                                                                <br>

                                                                <!-- Deskripsi -->
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Deskripsi</span>
                                                                <span
                                                                    class="fw-semibold text-gray-600 fs-6 mb-8 d-block text-wrap">
                                                                    {{ $item->deskripsi }}
                                                                </span>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Heading-->

                                                        <!--begin::Stats-->
                                                        <div class="d-flex">
                                                            <!-- Tahun Terbit -->
                                                            <div
                                                                class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                                <span
                                                                    class="fs-6 text-gray-700 fw-bold">{{ $item->tahun_terbit }}</span>
                                                                <div class="fw-semibold text-gray-500">Tahun Terbit
                                                                </div>
                                                            </div>

                                                            <!-- Stok Buku -->
                                                            <div
                                                                class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                                <span
                                                                    class="fs-6 text-gray-700 fw-bold">{{ $item->stok }}</span>
                                                                <div class="fw-semibold text-gray-500">Stok Buku</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Header-->

                                                    <!--begin::Actions (Edit & Delete)-->
                                                    <div class="d-inline-flex gap-2">
                                                        <a href="{{ route('buku.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                                                            <i class="fa fa-pencil"></i> <span>Edit</span>
                                                        </a>

                                                        <button class="btn btn-sm btn-danger delete-buku"
                                                            data-id="{{ $item->id }}" data-judul="{{ $item->judul }}">
                                                            <i class="fa fa-trash"></i> <span>Delete</span>
                                                        </button>

                                                        <!-- Form delete -->
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('buku.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                            </div>
                                            <!--end::Col-->

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Pagination -->
                            <div class="pagination d-flex justify-content-center align-items-center mt-5">
                                {{-- Tombol Previous --}}
                                <button class="btn {{ $buku->onFirstPage() ? 'disabled' : '' }}"
                                    {{ $buku->onFirstPage() ? 'disabled' : '' }}
                                    onclick="window.location.href='{{ $buku->previousPageUrl() }}'">
                                    <i class="ki-outline ki-black-left"></i>
                                </button>

                                {{-- Halaman Dinamis --}}
                                @php
                                $currentPage = $buku->currentPage();
                                $lastPage = $buku->lastPage();
                                $startPage = max(1, $currentPage - 2);
                                $endPage = min($lastPage, $currentPage + 2);
                                @endphp

                                {{-- Tampilkan nomor halaman dengan logika dinamis --}}
                                @if($startPage > 1)
                                <button class="btn" onclick="window.location.href='{{ $buku->url(1) }}'">1</button>
                                @if($startPage > 2)
                                <span class="btn disabled">...</span>
                                @endif
                                @endif

                                @for($page = $startPage; $page <= $endPage; $page++) <button
                                    class="btn {{ $page == $currentPage ? 'active btn-primary' : '' }}"
                                    onclick="window.location.href='{{ $buku->url($page) }}'" @if($page==$currentPage)
                                    disabled @endif>
                                    {{ $page }}
                                    </button>
                                    @endfor

                                    @if($endPage < $lastPage) @if($endPage < $lastPage - 1) <span class="btn disabled">
                                        ...</span>
                                        @endif
                                        <button class="btn"
                                            onclick="window.location.href='{{ $buku->url($lastPage) }}'">
                                            {{ $lastPage }}
                                        </button>
                                        @endif

                                        {{-- Tombol Next --}}
                                        <button class="btn {{ $buku->hasMorePages() ? '' : 'disabled' }}"
                                            {{ $buku->hasMorePages() ? '' : 'disabled' }}
                                            onclick="window.location.href='{{ $buku->nextPageUrl() }}'">
                                            <i class="ki-outline ki-black-right"></i>
                                        </button>
                            </div>


                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Player widget 1-->

                </div>
                <!--end::Col-->
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function () {
        $("#searchForm").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('bukus.index') }}",
                type: "GET",
                data: formData,
                dataType: "json", // Pastikan respons berupa JSON
                success: function (response) {
                    // Update jumlah buku yang ditemukan
                    $("#BukuDitemukan").text(response.filteredbukusCount ?
                        `Ditemukan ${response.filteredbukusCount} Buku` :
                        `Total Buku: ${response.totalbukus}`);

                    // Perbarui daftar buku jika ada ID untuk bagian tersebut
                    $("#book-list").html(response.html);
                },
                error: function () {
                    alert("Terjadi kesalahan saat mencari buku.");
                }
            });
        });

        // Format input date range
        $("#tahun_terbit").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    });

</script>


<script>
    var genreSearchInput = document.querySelector("#taglify_genres");
    var tagify = new Tagify(genreSearchInput, {
        whitelist: [
            "Action", "Adventure", "Biography", "Business", "Children", "Classics",
            "Comics", "Contemporary", "Cookbooks", "Crime", "Dystopian", "Education",
            "Fantasy", "Fiction", "Graphic Novels", "Historical", "History", "Horror",
            "Humor", "LGBTQ+", "Manga", "Memoir", "Motivational", "Music", "Mystery",
            "Non-Fiction", "Paranormal", "Philosophy", "Poetry", "Psychology", "Religion",
            "Romance", "Science", "Science Fiction", "Self-Help", "Short Stories", "Spirituality",
            "Sports", "Supernatural", "Suspense", "Thriller", "Travel", "True Crime", "Western",
            "Young Adult"
        ],
        maxTags: 10,
        dropdown: {
            maxItems: 20,
            classname: "tagify__inline__suggestions",
            enabled: 0,
            closeOnSelect: false
        }
    });

    // Konversi hasil input menjadi JSON string sebelum dikirim
    genreSearchInput.addEventListener("change", function () {
        this.value = JSON.stringify(tagify.value.map(tag => tag.value));
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var link = document.getElementById("kt_horizontal_search_advanced_link");
        var advancedForm = document.getElementById("kt_advanced_search_form");
        var bsCollapse = new bootstrap.Collapse(advancedForm, {
            toggle: false
        }); // Pastikan toggle: false agar tidak auto-toggle

        link.addEventListener("click", function (e) {
            e.preventDefault();

            if (advancedForm.classList.contains("show")) {
                bsCollapse.hide();
                link.textContent = "Advanced Search";
            } else {
                bsCollapse.show();
                link.textContent = "Tutup Advanced Search";
            }
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let searchInput = document.getElementById("searchInput");
        let clearSearch = document.getElementById("clearSearch");

        // Fungsi untuk menampilkan atau menyembunyikan tombol clear
        function toggleClearButton() {
            if (searchInput.value.length > 0) {
                clearSearch.classList.remove("d-none");
            } else {
                clearSearch.classList.add("d-none");
            }
        }

        // Event ketika mengetik
        searchInput.addEventListener("input", toggleClearButton);

        // Event ketika klik tombol clear
        clearSearch.addEventListener("click", function () {
            searchInput.value = "";
            toggleClearButton();
            searchInput.focus(); // Fokus kembali ke input setelah dikosongkan
        });

        // Jalankan saat pertama kali halaman dimuat (jika ada nilai default di input)
        toggleClearButton();
    });

</script>
<script>
    $(document).ready(function () {
        // Inisialisasi Select2
        $('#kategoriSelect').select2({
            placeholder: "Pilih kategori",
            allowClear: false // Kita buat tombol clear sendiri
        });

        function toggleClearButton() {
            if ($('#kategoriSelect').val()) {
                $('#clearKategori').show(); // Tampilkan tombol jika ada pilihan
            } else {
                $('#clearKategori').hide(); // Sembunyikan jika tidak ada pilihan
            }
        }

        // Cek kondisi saat halaman dimuat (untuk menangani nilai default dari request)
        toggleClearButton();

        // Event ketika pengguna memilih kategori
        $('#kategoriSelect').on('change', function () {
            toggleClearButton();
        });

        // Event klik pada tombol clear kategori
        $('#clearKategori').click(function () {
            $('#kategoriSelect').val(null).trigger('change'); // Reset pilihan
            toggleClearButton(); // Pastikan tombol X disembunyikan kembali
        });
    });

</script>

<script>
    $('body').on('click', '.delete-buku', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var bookTitle = $(this).data('judul');

        Swal.fire({
            title: 'Konfirmasi',
            text: `Anda yakin ingin menghapus buku "${bookTitle}"?`,
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, kembali!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Redirect to the delete URL    
            }
        });
    });

</script>

@endsection
