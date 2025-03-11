@extends('master.master')

@section('content')

<div class="container-fluid p-1">
    <!-- Banner Section -->
    <div id="homeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner w-100">
            @for ($i = 1; $i <= 9; $i++)
            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                <img src="{{ asset('assets/media/home/home_bg00' . $i . '.jpg') }}" 
                     alt="Banner Webtoon {{ $i }}" 
                     class="d-block w-100 img-fluid"
                     style="width: 100vw; height: auto;">
            </div>
            @endfor
        </div>
    </div>
</div>
</div>
</div>
<div class="container py-6">
<div class="container py-12 d-flex justify-content-center flex-wrap gap-5">
    <a href="#" class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
        <div class="card-body d-flex align-items-center">
            <i class="ki-duotone ki-teacher fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>

            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                Buku Pembelajaran
            </span>
        </div>
    </a>

    <a href="#" class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
        <div class="card-body d-flex align-items-center">
            <i class="ki-duotone ki-book-square fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>

            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                Novel
            </span>
        </div>
    </a>

    <a href="#" class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
        <div class="card-body d-flex align-items-center">
            <i class="ki-duotone ki-book-square fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>

            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                Komik
            </span>
        </div>
    </a>

    <a href="#" class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
        <div class="card-body d-flex align-items-center">
            <i class="ki-duotone ki-book-square fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>

            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                Dongeng
            </span>
        </div>
    </a>
</div>

<!-- Search Bar -->
<div class="container py-4">
    <form action="{{ route('bukus.index') }}" method="GET" class="d-flex mb-5">
        <input type="text" name="search" class="form-control form-control-solid me-2" placeholder="Cari Buku..."
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">
            <i class="ki-outline ki-magnifier"></i> Cari
        </button>
    </form>
</div>

<div class="container d-flex justify-content-center align-items-center">
    <!--begin::Underline-->
    <span class="d-inline-block position-relative m-1">
        <!--begin::Label-->
        <span class="d-inline-block mb-2 fs-2tx fw-bold text-primary">
            BUKU TERBARU
        </span>
        <!--end::Label-->

        <!--begin::Line-->
        <span
            class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-secondary translate rounded"></span>
        <!--end::Line-->
    </span>
    <!--end::Underline-->
</div>

<!-- Book Grid -->
<div class="row g-4 py-12">
    @foreach ($bukus as $buku)
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
                <h5 class="fw-bold text-gray-800 mb-2 text-truncate" title="{{ $buku->judul }}">{{ $buku->judul }}</h5>
                @if($buku->penulis)
                <div class="text-muted small mb-2">
                    <i class="ki-duotone ki-user me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>{{ $buku->penulis }}</div>
                @endif

                @if($buku->tahun_terbit)
                <div class="text-gray-600 small mb-2">
                    <i class="ki-outline ki-calendar me-1"></i> {{ $buku->tahun_terbit }}
                </div>
                @endif

                <div class="d-flex justify-content-end">
                    <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-sm btn-primary w-100">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Tombol Lihat Semua Buku -->
@if ($totalBuku > 8)
<div class="text-center py-10">
    <a href="{{ route('bukus.index') }}" class="btn btn-lg btn-primary">
        <i class="fas fa-book"></i> Lihat Semua Buku
    </a>
</div>
@endif
</div>
</div>
</div>
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
