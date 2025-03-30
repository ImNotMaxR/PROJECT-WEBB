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
                                        <th>Aksi</th>
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
                                        <td>
                                            @if($pinjam->status == 'disetujui')
                                            <button class="btn btn-sm btn-primary btn-perpanjang"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalPerpanjangan"
                                                    data-peminjaman_id="{{ $pinjam->id }}"
                                                    data-judul_buku="{{ $pinjam->buku->judul }}">
                                                Perpanjang
                                            </button>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-end">
                        <small>Total Buku Dipinjam Oleh Anda : <strong>{{ $peminjaman->count() }}</strong></small>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalPerpanjangan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Perpanjangan Peminjaman Buku</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('perpanjangan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="peminjaman_id" id="peminjaman_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Alasan Perpanjangan</label>
                        <input type="text" name="alasan" class="form-control" placeholder="Tuliskan alasan perpanjangan">
                    </div>
                    <div class="mb-3">
                        <label>Tambahan Waktu (Hari)</label>
                        <select name="jumlah_hari" class="form-select">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{ $i }}">+{{ $i }} Hari</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Ajukan Perpanjangan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
    $('.btn-perpanjang').click(function() {
        const peminjamanId = $(this).data('peminjaman_id');
        $('#peminjaman_id').val(peminjamanId);
    });
});
    </script>
@endsection
