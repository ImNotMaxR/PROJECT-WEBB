@extends('master.master')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="fw-bold">Daftar Buku yang Anda Pinjam</h2>
        </div>
    </div>
    <div class="row">
        @if($peminjaman->isEmpty())
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <strong>{{ Auth::user()->name }}</strong>, Anda belum meminjam buku.
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="card card-flush">
                    <div class="card-header py-5">
                        <h3 class="card-title fw-bold text-gray-800">Buku yang Dipinjam</h3>
                        <span class="text-muted fs-6">Menampilkan daftar buku yang Anda pinjam beserta status peminjaman</span>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">    
                            <table class="table table-striped table-bordered">    
                                <thead>  
                                    <tr>
                                        <th>Cover Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peminjaman as $index => $pinjam)
                                    <tr>
                                        <td>
                                            <img src="{{ $pinjam->buku->foto ? Storage::url($pinjam->buku->foto) : '' }}" 
                                                 alt="Cover Buku" 
                                                 class="rounded" 
                                                 style="width: 70px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark">{{ $pinjam->buku->judul }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge badge-light-{{ 
                                                $pinjam->status == 'pending' ? 'warning' : 
                                                ($pinjam->status == 'disetujui' ? 'success' : 
                                                ($pinjam->status == 'dikembalikan' ? 'primary' : 'danger')) 
                                            }}">
                                                {{ ucfirst($pinjam->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-end">
                        <small>Total Buku Dipinjam: <strong>{{ $peminjaman->count() }}</strong></small>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
