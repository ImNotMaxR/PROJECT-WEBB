@extends('master.master')  
  
@section('content')  
<script>  $(document).ready(function() {  
    // Inisialisasi DataTable  
    var table = $('#kategoriTable').DataTable({  
        processing: true,  
        serverSide: true,  
        ajax: "{{ route('kategori.data') }}", // URL untuk mendapatkan data  
        columns: [  
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },  
            { data: 'nama', name: 'nama' },  
            { data: 'deskripsi', name: 'deskripsi' },  
            { data: 'action', name: 'action', orderable: false, searchable: false }  
        ],  
        language: {  
            lengthMenu: "Tampilkan _MENU_ entri",  
            zeroRecords: "Tidak ada data ditemukan",  
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",  
            infoEmpty: "Tidak ada entri tersedia",  
            infoFiltered: "(disaring dari _MAX_ total entri)",  
            search: "Cari:",  
            paginate: {  
                first: "Pertama",  
                last: "Terakhir",  
                next: "Selanjutnya",  
                previous: "Sebelumnya"  
            }  
        }  
    });  
  
    // Event untuk mengisi modal edit  
    $(document).on('click', '.edit-kategori', function() {  
        const id = $(this).data('id');  
        const nama = $(this).data('nama');  
        const deskripsi = $(this).data('deskripsi');  
  
        const form = $('#kt_modal_edit_kategori_form');  
        form.attr('data-id', id); // Simpan ID di atribut data  
        form.find('input[name="nama"]').val(nama);  
        form.find('input[name="deskripsi"]').val(deskripsi);  
    });  
  
    // Event untuk mengupdate kategori  
    $(document).on('click', '#updateKategoriButton', function() {  
        const id = $('#kt_modal_edit_kategori_form').data('id'); // Ambil ID dari atribut data  
        const formData = $('#kt_modal_edit_kategori_form').serialize(); // Ambil data dari form  
  
        $.ajax({  
            url: `{{ url('/kategori/update/') }}/${id}`, // URL lebih dinamis
            type: 'POST',  
            _method: 'PUT',
            data: formData,  
            success: function(response) {  
                $('#Category').modal('hide'); // Sembunyikan modal  
                table.ajax.reload(); // Reload DataTable  
                alert(response.success); // Tampilkan pesan sukses  
            },  
            error: function(xhr) {  
                // Tangani error jika ada  
                alert('Terjadi kesalahan saat memperbarui kategori.');  
            }  
        });  
    });  
  
    // Event untuk menghapus kategori  
    $(document).on('click', '.delete-kategori', function() {  
        const id = $(this).data('id');  
        if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {  
            $.ajax({  
                url: `/kategori/destroy/${id}`,  
                type: 'DELETE',  
                data: {  
                    _token: '{{ csrf_token() }}'  
                },  
                success: function(response) {  
                    table.ajax.reload(); // Reload DataTable  
                    alert(response.success); // Tampilkan pesan sukses  
                }  
            });  
        }  
    });  
});  

</script>  
  
<div class="container">  
    <div class="row">  
        <div class="py-12">  
            <div class="card">  
                <div class="card-header border-0 d-flex justify-content-between align-items-center">  
                    <h3 class="card-title">Katalog Kategori</h3>  
                    <div>  
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>  
                        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kelola Buku</a>  
                    </div>  
                </div>  
                @if (session('success'))  
                    <div class="alert alert-success">  
                        {{ session('success') }}  
                    </div>  
                @endif  
                <div class="table-responsive">  
                    <table class="table table-striped table-bordered" id="kategoriTable">  
                        <thead>  
                            <tr>  
                                <th>No.</th>  
                                <th>Nama</th>  
                                <th>Deskripsi</th>  
                                <th>Aksi</th>  
                            </tr>  
                        </thead>  
                    </table>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  <!--begin::Modal - Edit Kategori-->  
<div class="modal fade" id="Category" tabindex="-1" aria-hidden="true">  
    <div class="modal-dialog modal-dialog-centered mw-900px">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h2>Edit Kategori</h2>  
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">  
                    <i class="ki-duotone ki-cross fs-1">  
                        <span class="path1"></span>  
                        <span class="path2"></span>  
                    </i>  
                </div>  
            </div>  
            <div class="modal-body py-lg-10 px-lg-10">  
                <form id="kt_modal_edit_kategori_form"> <!-- Hapus action dan method dari form -->  
                    @csrf  
                    @method('PUT')  
                    <div class="w-100">  
                        <div class="fv-row mb-10">  
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">  
                                <span class="required">Nama Kategori</span>  
                            </label>  
                            <input type="text" name="nama" class="form-control form-control-lg form-control-solid" required />  
                        </div>  
                        <div class="fv-row mb-10">  
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">  
                                <span class="required">Deskripsi</span>  
                            </label>  
                            <input type="text" name="deskripsi" class="form-control form-control-lg form-control-solid" />  
                        </div>  
                    </div>  
                    <div class="d-flex flex-stack pt-10">  
                        <div></div>  
                        <div>  
                            <button type="button" class="btn btn-lg btn-primary" id="updateKategoriButton"> <!-- Tambahkan ID untuk tombol -->  
                                <span class="indicator-label">Perbarui  
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0">  
                                        <span class="path1"></span>  
                                        <span class="path2"></span>  
                                    </i>  
                                </span>  
                                <span class="indicator-progress">Please wait...  
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>  
                                </span>  
                            </button>  
                        </div>  
                    </div>  
                </form>  
            </div>  
        </div>  
    </div>  
</div>  
<!--end::Modal - Edit Kategori-->  

@endsection  
