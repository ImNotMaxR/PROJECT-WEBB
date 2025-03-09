@extends('master.master')

@section('content')
<div class="container py-12">
    <!-- Banner Section -->
    <div id="homeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @for ($i = 1; $i <= 9; $i++)
            <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                <img src="{{ asset('assets/media/home/home_bg00' . $i . '.jpg') }}" alt="Banner Webtoon {{ $i }}" class="d-block w-100 img-fluid">
            </div>
            @endfor
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container py-4">
    <form action="{{ route('bukus.index') }}" method="GET" class="d-flex mb-5">
        <input type="text" name="search" class="form-control form-control-solid me-2" placeholder="Cari Buku..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">
            <i class="ki-outline ki-magnifier"></i> Cari
        </button>
    </form>
</div>

    <!-- Book Grid -->
    <div class="row g-4">
        @foreach ($bukus as $buku)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm h-100">
                <!-- Book Cover -->
                <div class="book-cover">
                    <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid">
                </div>
                
                <!-- Book Details -->
                <div class="card-body p-4">
                    <h5 class="fw-bold text-gray-800 mb-2 text-truncate" title="{{ $buku->judul }}">{{ $buku->judul }}</h5>
                    @if($buku->penulis)
                    <div class="text-muted small mb-2">{{ $buku->penulis }}</div>
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
        @endforeach
    </div>
</div>
</div>
@include('master.footer')
@endsection


<style>
    .book-cover {
        width: 100%;
        height: 300px; /* Fixed height for book cover */
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
    }
</style>


