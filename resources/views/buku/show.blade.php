@extends('master.master')

@section('content')
    <div class="container mt-5">
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
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <h3 class="card-title">Cover Image</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid rounded"
                            style="max-height: 300px; width: auto;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer">
                        <h3 class="card-title">Book Details</h3>
                    </div>
                    <div class="card-body">

                        <h1 class="mb-4">{{ $buku->judul }}</h1>
                        <p><strong>Deskripsi:</strong> {{ $buku->deskripsi }}</p>
                        <p><strong>Genre Buku:</strong> {{ $buku->genre }}</p>
                        <p><strong>Kategori:</strong> {{ $buku->kategori->nama }}</p>
                        <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                        <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                        <p><strong>Stok:</strong> {{ $buku->stok }}</p>
                        <a href="{{ route('home') }}" class="btn btn-secondary mt-7 ">Kembali ke Daftar Buku</a>

                        @if($buku->stok > 0)
                            <button id="pinjamBtn" class="btn btn-primary mt-7">Pinjam Buku</button>
                        @else
                            <button id="outOfStockBtn" class="btn btn-danger mt-7">Stok Habis</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle successful flash messages
        @if(Session::has('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ Session::get('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Handle error flash messages
        @if(Session::has('error'))
            Swal.fire({
                title: 'Gagal!',
                text: "{{ Session::get('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif

        // Pinjam button handler
        const pinjamBtn = document.getElementById('pinjamBtn');
        var judulBuku = "{{ $buku->judul }}";
        if (pinjamBtn) {
            pinjamBtn.addEventListener('click', function() {
                // Get the current stock value
                const stok = {{ $buku->stok }};
                
                // Create options for the select dropdown
                let options = '';
                for (let i = 1; i <= stok; i++) {
                    options += `<option value="${i}">${i}</option>`;
                }
                
                Swal.fire({
                    title: 'Jumlah Buku',
                    html: `
                        <div class="form-group">
                            <label for="jumlahBuku">Pilih jumlah buku yang ingin dipinjam:</label>
                            <select id="jumlahBuku" class="form-control">
                                ${options}
                            </select>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan',
                    cancelButtonText: 'Batal',
                    preConfirm: () => {
                        return document.getElementById('jumlahBuku').value;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const jumlahBuku = result.value;
                        
                        // Second confirmation with selected quantity
                        Swal.fire({
                            title: 'Konfirmasi Peminjaman',
                            text: `Apakah Anda yakin ingin meminjam ${jumlahBuku} buku "${judulBuku}"?`,
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Pinjam!',
                            cancelButtonText: 'Batal'
                        }).then((confirmResult) => {
                            if (confirmResult.isConfirmed) {
                                window.location.href = "{{ route('pinjam.buku', ['id' => $buku->id]) }}?jumlah_buku=" + jumlahBuku;
                            }
                        });
                    }
                });
            });
        }

        // Out of stock button handler
        const outOfStockBtn = document.getElementById('outOfStockBtn');
        if (outOfStockBtn) {
            outOfStockBtn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Stok Habis!',
                    text: 'Maaf, buku "{{ $buku->judul }}" sedang tidak tersedia. Silakan cek kembali nanti.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
</script>
@endsection