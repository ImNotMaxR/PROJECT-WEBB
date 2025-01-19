@extends('master.master')      
@section('title', 'Kelola Peminjaman Buku')      
  
@section('content')      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    
  
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">      
    <div class="content flex-row-fluid" id="kt_content">      
        <div class="row g-5 g-xl-12">      
            <div class="col-xl-12">      
                <div class="py-12">      
                    <div class="card card-flush h-xl-100">      
                        <!--begin::Header-->      
                        <div class="card-header pt-7">      
                            <h3 class="card-title align-items-start flex-column">      
                                <span class="card-label fw-bold text-gray-800">Kelola Peminjaman Buku</span>      
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Peminjaman: {{ $data->count() }}</span>        
                            </h3>      
                        </div>      
                        <!--end::Header-->      
  
                        @if (session('success'))      
                        <div class="alert alert-success">      
                            {{ session('success') }}      
                        </div>      
                        @endif      
  
                        <div class="card-body">      
                            <div class="table-responsive">      
                                <table class="table table-striped table-bordered" id="tabel_peminjaman">      
                                    <thead>      
                                        <tr>      
                                            <th>No.</th>      
                                            <th>Foto Buku</th>      
                                            <th>Nama Peminjam</th>      
                                            <th>Judul Buku</th>      
                                            <th>Stok</th>      
                                            <th>Tanggal Pinjam</th>      
                                            <th>Tanggal Kembali</th>      
                                            <th>Status</th>      
                                            <th>Aksi</th>      
                                        </tr>      
                                    </thead>      
                                    <tbody>      
                                        @foreach ($data as $index => $peminjaman)      
                                        @if (in_array($peminjaman->status, ['pending', 'disetujui', 'dikembalikan', 'denda']))      
                                        <tr>      
                                            <td>{{ $index + 1 }}</td>      
                                            <td>    
                                                <img src="{{ Storage::url($peminjaman->buku->foto) }}" width="50px" alt="Foto Buku">      
                                            </td>    
                                            <td>{{ $peminjaman->user->name }}</td>      
                                            <td>{{ $peminjaman->buku->judul }}</td>      
                                            <td>{{ $peminjaman->buku->stok }}</td>      
                                            <td>{{ $peminjaman->tanggal_pinjam }}</td>      
                                            <td>{{ $peminjaman->tanggal_kembali }}</td>      
                                            <td>      
                                                <span class="badge badge-light-{{ $peminjaman->status == 'pending' ? 'warning' : ($peminjaman->status == 'disetujui' ? 'success' : ($peminjaman->status == 'dikembalikan' ? 'primary' : 'danger')) }}">      
                                                    {{ ucfirst($peminjaman->status) }}      
                                                </span>      
                                            </td>      
                                            <td>      
                                                <div class="d-flex justify-content-around">      
                                                    <!-- Button untuk Set Pending -->      
                                                    <button class="btn btn-warning btn-sm update-status" data-id="{{ $peminjaman->id }}" data-status="pending" title="Set Pending">      
                                                        <i class="bi bi-clock-history"></i>      
                                                    </button>      
                                                    <!-- Button untuk Set Disetujui -->      
                                                    <button class="btn btn-success btn-sm update-status" data-id="{{ $peminjaman->id }}" data-status="disetujui" title="Set Disetujui">      
                                                        <i class="bi bi-check-circle"></i>      
                                                    </button>      
                                                    <!-- Button untuk Set Dikembalikan -->      
                                                    <button class="btn btn-primary btn-sm update-status" data-id="{{ $peminjaman->id }}" data-status="dikembalikan" title="Set Dikembalikan">      
                                                        <i class="bi bi-arrow-counterclockwise"></i>      
                                                    </button>      
                                                    <!-- Button untuk Set Denda -->      
                                                    <button class="btn btn-danger btn-sm update-status" data-id="{{ $peminjaman->id }}" data-status="denda" title="Set Denda">      
                                                        <i class="bi bi-exclamation-triangle"></i>      
                                                    </button>      
                                                    <!-- Button untuk Delete -->      
                                                    @if (in_array($peminjaman->status, ['dikembalikan', 'pending']))      
                                                    <button class="btn btn-danger btn-sm delete-peminjaman" data-id="{{ $peminjaman->id }}" title="Hapus">      
                                                        <i class="bi bi-trash"></i>      
                                                    </button>      
                                                    @endif      
                                                </div>      
                                            </td>      
                                        </tr>      
                                        @endif      
                                        @endforeach      
                                    </tbody>      
                                </table>      
                            </div>      
                        </div>      
                    </div>      
                </div>      
            </div>      
        </div>      
    </div>      
</div>      
  
@endsection      
  
@section('script')      
<script>      
    document.addEventListener('DOMContentLoaded', function () {
    // Initialize DataTable
    const tabel = new DataTable('#tabel_peminjaman');

    // Status messages and confirmations configuration
    const statusConfig = {
        pending: {
            title: 'Ubah Status ke Pending?',
            text: 'Peminjaman akan dikembalikan ke status menunggu persetujuan.',
            icon: 'warning',
            confirmButton: 'Ya, Set Pending'
        },
        disetujui: {
            title: 'Setujui Peminjaman?',
            text: 'Buku akan dipinjamkan kepada peminjam.',
            icon: 'success',
            confirmButton: 'Ya, Setujui'
        },
        dikembalikan: {
            title: 'Konfirmasi Pengembalian?',
            text: 'Pastikan buku telah dikembalikan dalam kondisi baik.',
            icon: 'info',
            confirmButton: 'Ya, Konfirmasi Kembali'
        },
        denda: {
            title: 'Terapkan Status Denda?',
            text: 'Peminjam akan dikenakan denda sesuai ketentuan.',
            icon: 'warning',
            confirmButton: 'Ya, Terapkan Denda'
        }
    };

    // Success messages for each status
    const successMessages = {
        pending: 'Status peminjaman berhasil diubah ke pending',
        disetujui: 'Peminjaman buku berhasil disetujui',
        dikembalikan: 'Buku berhasil dikonfirmasi pengembaliannya',
        denda: 'Status denda berhasil diterapkan pada peminjaman'
    };

    // Event Listener untuk update status
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const status = this.dataset.status;
            const config = statusConfig[status];

            Swal.fire({
                title: config.title,
                text: config.text,
                icon: config.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: config.confirmButton,
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('peminjaman.updateStatus') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ id, status })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: successMessages[status],
                                icon: "success"
                            }).then(() => location.reload());
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat mengubah status.",
                                icon: "error"
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan pada koneksi atau server.",
                            icon: "error"
                        });
                    });
                }
            });
        });
    });

    // Event Listener untuk delete peminjaman
    document.querySelectorAll('.delete-peminjaman').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            Swal.fire({
                title: 'Hapus Data Peminjaman?',
                text: "Data peminjaman akan dihapus secara permanen dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('peminjaman.destroy', '') }}/" + id, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data peminjaman berhasil dihapus.",
                                icon: "success"
                            }).then(() => location.reload());
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat menghapus data.",
                                icon: "error"
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan pada koneksi atau server.",
                            icon: "error"
                        });
                    });
                }
            });
        });
    });
});
</script>      
@endsection  
