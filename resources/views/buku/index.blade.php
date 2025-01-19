@extends('master.master')
@section('title', 'Kelola Buku')

@section('content')
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
                                <!--end::Daterangepicker-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->


                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="tabel_buku">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
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
<style>
    /* CSS for truncating the description text */
    #tabel_buku td:nth-child(4) {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        /* Adjust the max-width as needed */
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        #tabel_buku td:nth-child(4) {
            max-width: 100px;
            /* Adjust the max-width for smaller screens */
        }
    }

    @media (max-width: 576px) {
        #tabel_buku td:nth-child(4) {
            max-width: 100px;
            /* Further reduce the max-width for very small screens */
        }
    }

</style>

<script>
    $(document).ready(function () {
        $('#tabel_buku').DataTable({
            processing: true,
            serverSide: true,
            responsive: false, // Menambahkan opsi responsive  
            ajax: {
                url: "{{ route('buku.datatables') }}",
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'foto',
                    name: 'foto'
                }, // Ensure this matches the column in the response  
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'penulis',
                    name: 'penulis'
                },
                {
                    data: 'penerbit',
                    name: 'penerbit'
                },
                {
                    data: 'tahun_terbit',
                    name: 'tahun_terbit'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'stok',
                    name: 'stok'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
            order: [
                [2, 'asc']
            ],
            // Mengurutkan berdasarkan kolom 'nama'  
            dom: "<'row mb-2'" +
                "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

        // Tombol delete    
        $('body').on('click', '.delete-buku', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var bookTitle = $(this).data('judul'); // Get the book title from the data attribute    

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
    });

</script>

@endsection
