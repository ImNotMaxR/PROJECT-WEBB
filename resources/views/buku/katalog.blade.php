@extends('master.master')

@section('content')
<div class="container-fluid p-1">
    <div class="container py-6">
        <div class="container d-flex justify-content-center align-items-center">
            <!--begin::Underline-->
            <span class="d-inline-block position-relative m-1">
                <!--begin::Label-->
                <span class="d-inline-block mb-2 fs-2tx fw-bold text-primary">
                    KATALOG BUKU
                </span>
                <!--end::Label-->

                <!--begin::Line-->
                <span
                    class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-secondary translate rounded"></span>
                <!--end::Line-->
            </span>
            <!--end::Underline-->
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
                                        <button type="submit" class="btn btn-primary me-5">Search</button>
                                        <a href="#" id="kt_horizontal_search_advanced_link" class="btn btn-link"
                                            data-bs-target="#kt_advanced_search_form">Advanced
                                            Search</a>
                                    </div>
                                    <!--end:Action-->
                                </div>
                                <!--end::Compact form-->
                                <!--begin::Advance form-->
                                <div class="collapse" id="kt_advanced_search_form">
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed border-primary mt-9 mb-6"></div>
                                    <!--end::Separator-->
                                    <!--begin::Row-->
                                    <div class="row g-8 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-xxl-4">
                                            <label class="fs-6 form-label fw-bold text-dark">Genre</label>
                                            <input class="form-control form-control-solid" id="taglify_genres"
                                                name="genre" data-name="genre" value="{{ request('genre') }}" />
                                            <div class="text-muted fs-7">Pilih genre untuk mencari buku</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xxl-5">
                                            <!--begin::Row-->
                                            <div class="row g-8">
                                                <!--begin::Col-->
                                                <div class="col-lg-10">
                                                    <label class="fs-6 form-label fw-bold text-dark">Kategori</label>
                                                    <!--begin::Select-->
                                                    <div class="d-flex align-items-center">
                                                        <select id="kategoriSelect" name="kategori_id"
                                                            class="form-select form-select-solid flex-grow-1"
                                                            data-control="select2" data-placeholder="Pilih kategori">
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
                                                    <div class="text-muted fs-7">Pilih Buku Berdasarkan Kategori</div>
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
                                                    <label class="fs-6 form-label fw-bold text-dark">Cari
                                                        Berdasarkan</label>
                                                    <!--begin::Radio group-->
                                                    <div class="nav-group nav-group-fluid">
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="type"
                                                                value="has"
                                                                {{ request('type', 'has') == 'has' ? 'checked' : '' }} />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Semua</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="type"
                                                                value="judul"
                                                                {{ request('type') == 'judul' ? 'checked' : '' }} />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Judul</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="type"
                                                                value="penulis"
                                                                {{ request('type') == 'penulis' ? 'checked' : '' }} />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Penulis</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label>
                                                            <input type="radio" class="btn-check" name="type"
                                                                value="penerbit"
                                                                {{ request('type') == 'penerbit' ? 'checked' : '' }} />
                                                            <span
                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Penerbit</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <div class="text-muted fs-7">Pilih Buku Berdasarkan Pilihan</div>
                                                    <!--end::Radio group-->
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="fs-6 form-label fw-bold text-dark">Tahun
                                                        Terbit</label>
                                                    <input type="number" name="tahun_terbit" id="tahun_terbit"
                                                        class="form-control form-control-solid" min="1900"
                                                        max="{{ date('Y') }}" placeholder="Masukkan Tahun Terbit"
                                                        value="{{ request('tahun_terbit') }}">
                                                    <div class="text-muted fs-7">Pilih Buku Berdasarkan Jarak Waktu
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
        <!--begin::Title-->
        <div class="d-flex flex-wrap flex-stack pb-7">
            <!--begin::Jumlah Buku Yang Ditemukan Saat User Setelah Mencari-->
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bold me-5 my-1" id="BukuDitemukan">
                    {{ request()->has('search') || request()->has('genre') || request()->has('kategori_id') ? 
                       " $filteredbukusCount Buku Ditemukan" : "Total Buku: $totalbukus" }}
                </h3>
            </div>
            <!--end::Jumlah Buku Yang Ditemukan Saat User Setelah Mencari-->
        </div>

        <!-- Book Grid -->
        <div class="row g-5 py-12">
            @forelse ($bukus as $buku)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-sm h-100">
                    <!-- Book Cover -->
                    <div class="book-cover my-5">
                        <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid">
                    </div>


                    <!-- Book Details -->
                    <div class="card-body p-4">
                        <div class="separator separator-dashed border-primary my-2"></div>
                        <div class="py-2">
                            <h5 class="fw-bold text-gray-800 mb-2 text-truncate" title="{{ $buku->judul }}">
                                {{ $buku->judul }}
                            </h5>

                            @if($buku->penulis)
                            <div class="text-muted small mb-2">
                                <i class="ki-duotone ki-user me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>{{ $buku->penulis }}
                            </div>
                            @endif


                            {{-- Tampilkan Genre --}}
                            @if($buku->genre)
                            <div class="text-muted small mb-2">
                                <i class="ki-outline ki-bookmark me-1"></i>
                                {{ is_array($buku->genre) ? implode(', ', $buku->genre) : $buku->genre }}
                            </div>
                            @endif


                            @if($buku->tahun_terbit)
                            <div class="text-gray-600 small mb-2">
                                <i class="ki-outline ki-calendar me-1"></i> {{ $buku->tahun_terbit }}
                            </div>
                            @endif
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-sm btn-primary w-100">
                                    <i class="fas fa-eye me-1"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Tidak ada buku yang ditemukan.
                </div>
            </div>
            @endforelse
        </div>
        <!-- Pagination -->
        <div class="pagination d-flex justify-content-center align-items-center mt-5">
            {{-- Tombol Previous --}}
            <button class="btn {{ $bukus->onFirstPage() ? 'disabled' : '' }}"
                {{ $bukus->onFirstPage() ? 'disabled' : '' }}
                onclick="window.location.href='{{ $bukus->previousPageUrl() }}'">
                <i class="ki-outline ki-black-left"></i>
            </button>

            {{-- Halaman Dinamis --}}
            @php
            $currentPage = $bukus->currentPage();
            $lastPage = $bukus->lastPage();
            $startPage = max(1, $currentPage - 2);
            $endPage = min($lastPage, $currentPage + 2);
            @endphp

            {{-- Tampilkan nomor halaman dengan logika dinamis --}}
            @if($startPage > 1)
            <button class="btn" onclick="window.location.href='{{ $bukus->url(1) }}'">1</button>
            @if($startPage > 2)
            <span class="btn disabled">...</span>
            @endif
            @endif

            @for($page = $startPage; $page <= $endPage; $page++) <button
                class="btn {{ $page == $currentPage ? 'active btn-primary' : '' }}"
                onclick="window.location.href='{{ $bukus->url($page) }}'" @if($page==$currentPage) disabled @endif>
                {{ $page }}
                </button>
                @endfor

                @if($endPage < $lastPage) @if($endPage < $lastPage - 1) <span class="btn disabled">...</span>
                    @endif
                    <button class="btn" onclick="window.location.href='{{ $bukus->url($lastPage) }}'">
                        {{ $lastPage }}
                    </button>
                    @endif

                    {{-- Tombol Next --}}
                    <button class="btn {{ $bukus->hasMorePages() ? '' : 'disabled' }}"
                        {{ $bukus->hasMorePages() ? '' : 'disabled' }}
                        onclick="window.location.href='{{ $bukus->nextPageUrl() }}'">
                        <i class="ki-outline ki-black-right"></i>
                    </button>
        </div>

        @include('master.footer')
        @endsection


        <style>
            .book-cover {
                width: 100%;
                height: 350px;
                /* Fixed height for book cover */
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                border-radius: 4px 4px 0 0;
            }

            .book-cover img {
                width: auto;
                height: 100%;
                object-fit: cover;
                border-radius: 5px;
            }

        </style>

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

        @endsection
