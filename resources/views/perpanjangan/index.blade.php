@extends('master.master')
@section('title', 'Kelola Perpanjangan Buku')

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
                                <span class="card-label fw-bold text-gray-800">Kelola Perpanjangan Buku</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Jumlah Data Perpanjangan: {{ $data }}
                                </span>
                            </h3>
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="tabel_perpanjangan">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Jumlah Hari</th>
                                            <th>Alasan Perpanjangan Buku</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perpanjangan as $index => $item)
                                        @if (in_array($item->peminjaman->status ?? '', ['disetujui', 'denda']))
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ Storage::url($item->peminjaman->buku->foto ?? '') }}"
                                                    width="50px" alt="Foto Buku">
                                            </td>
                                            <td>{{ $item->peminjaman->user->name ?? '-' }}</td>
                                            <td>{{ $item->peminjaman->buku->judul ?? '-' }}</td>
                                            <td>+ {{ $item->jumlah_hari }} Hari</td>
                                            <td>{{ $item->alasan }}</td>
                                            <td>{{ $item->peminjaman->tanggal_kembali ?? '-' }}</td>
                                            <td>
                                                <span class="badge 
                                                    @switch($item->status)
                                                        @case('pending')
                                                            badge-light-warning
                                                            @break
                                                        @case('disetujui')
                                                            badge-light-success
                                                            @break
                                                        @case('ditolak')
                                                            badge-light-danger
                                                            @break
                                                        @default
                                                            badge-light-secondary
                                                    @endswitch
                                                ">
                                                    {{ ucfirst($item->status ?? '-') }}
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Aksi 
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                                                    @if ($item->status == 'pending')
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3 btn-setujui" 
                                                               data-id="{{ $item->id }}" 
                                                               data-judul="{{ $item->peminjaman->buku->judul ?? '' }}">
                                                               Setujui
                                                            </a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3 btn-tolak" 
                                                               data-id="{{ $item->id }}" 
                                                               data-judul="{{ $item->peminjaman->buku->judul ?? '' }}">
                                                               Tolak
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 btn-hapus" 
                                                           data-id="{{ $item->id }}" 
                                                           data-judul="{{ $item->peminjaman->buku->judul ?? '' }}">
                                                           Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Menu-->
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
    $(document).ready(function () {
        // Handle SETUJUI
        $('.btn-setujui').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let judul = $(this).data('judul');
            Swal.fire({
                title: 'Setujui Perpanjangan?',
                text: `Anda yakin ingin menyetujui perpanjangan buku "${judul}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Setujui',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/buku/perpanjangan/setujui/' + id,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function (data) {
                            Swal.fire('Berhasil!', 'Perpanjangan disetujui.', 'success')
                                .then(() => location.reload());
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menyetujui.', 'error');
                        }
                    });
                }
            });
        });
    
        // Handle TOLAK
        $('.btn-tolak').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let judul = $(this).data('judul');
            Swal.fire({
                title: 'Tolak Perpanjangan?',
                text: `Anda yakin ingin menolak perpanjangan buku "${judul}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tolak',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/buku/perpanjangan/tolak/' + id,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function (data) {
                            Swal.fire('Ditolak!', 'Perpanjangan berhasil ditolak.', 'success')
                                .then(() => location.reload());
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menolak.', 'error');
                        }
                    });
                }
            });
        });
    
        // Handle HAPUS
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let judul = $(this).data('judul');
            Swal.fire({
                title: 'Hapus Data?',
                text: `Anda yakin ingin menghapus perpanjangan buku "${judul}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/buku/perpanjangan/hapus/' + id,
                        type: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function (data) {
                            Swal.fire('Terhapus!', 'Data perpanjangan berhasil dihapus.', 'success')
                                .then(() => location.reload());
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus.', 'error');
                        }
                    });
                }
            });
        });
    });
    </script>
    
@endsection
