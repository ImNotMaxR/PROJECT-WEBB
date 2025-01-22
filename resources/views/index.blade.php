    @extends('master.master')

    @section('content')
    <div class="container">
        <!-- Banner Section -->
        <div id="homeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
            data-bs-interval="5000">
            <div class="carousel-inner">
                @for ($i = 1; $i <= 9; $i++) <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                    <img src="{{ asset('assets/media/home/home_bg00' . $i . '.jpg') }}" alt="Banner Webtoon {{ $i }}"
                        class="d-block w-100 img-fluid">
            </div>
            @endfor
        </div>
    </div>
    <div class="py-12">
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Player widget 1-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h2 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Katalog Buku</span>
                        </h2>
                        <!--end::Title-->
<!-- Search books form -->
<form action="{{ route('bukus.index') }}" method="GET" class="d-flex">
    <input 
        type="text" 
        name="search" 
        class="form-control" 
        placeholder="Cari Buku..." 
        aria-label="Search books" 
        value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary ms-2">Cari</button>
</form>

                        <!--end::search books-->


                    </div>
                    <!--end::Header-->
                    <div class="card-body pt-7">
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
                            @foreach ($bukus as $buku)
                            <!--begin::Col-->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <!--begin::Book card-->
                                <div class="card" id="poto">
                                        <div class="card-body p-0">
                                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px"
                                                style="background-image:url('{{ Storage::url($buku->foto) }}');">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <h4><div
                                                class="text-gray-800">{{ $buku->judul }}</div></h4>
                                        @if(isset($buku->penulis))
                                        <span
                                            class="fw-bold fs-6 text-gray-400 d-block lh-1">{{ $buku->penulis }}</span>
                                            <a class="btn btn-primary hover" style="float: right;" href="{{ route('bukus.show', $buku->id) }}">Lihat Buku Ini</a>
                                            @endif
                                    </div>
                                </div>
                                <!--end::Book card-->
                            </div>
                            <!--end::Col-->
                            @endforeach
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
            </div>
            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <i class="ki-outline ki-arrow-up"></i>
            </div>
            <!--end::Scrolltop-->
        </div>
        <!--begin::Footer-->
        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2023&copy;</span>
                    <a href="https://keenthemes.com" target="_blank"
                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    @endsection

    <style>
        .carousel-item {
            transition: 5s ease-in-out;
        }

        /* Additional custom styles to enhance Metronic's default styling */
        #poto {
            border: 0px solid;
            border-radius: 0.625rem;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        #poto:hover {
            border: 3px solid #50cd89;
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bgi-size-cover {
            background-size: cover !important;
        }

        /* Responsive adjustments */
        @media (max-width: 1400px) {
            .col-lg-4 {
                flex: 0 0 auto;
                width: 33.333%;
            }
        }

        @media (max-width: 992px) {
            .col-lg-4 {
                width: 50%;
            }
        }

        @media (max-width: 768px) {
            .col-lg-4 {
                width: 100%;
            }
        }

    </style>

    <script>
        let timeout = null;

        function debounceSearch() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 300); // Mengirimkan formulir setelah 300ms tidak ada input  
        }

    </script>
