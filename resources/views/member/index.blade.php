@extends('master.master')
@section('title', 'Kelola User')

@section('content')

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row g-5 g-xl-12">
            <!--begin::Col-->
            <div class="col-xl-12">
                <div class="py-12">
                    <!--begin::Table widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Kelola Users</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Users:
                                    {{ $users->count() }}</span>
                            </h3>
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-users-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Search Users" />
                            </div>
                            <!--end::Search-->
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_customer">
                                        <i class="ki-duotone ki-plus-square fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i> Tambah User
                                    </button>
                                </a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="tabel_users">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/media/avatars/blank.png') }}"
                                                    alt="avatar" width="50px" /></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Aksi
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('member.edit', $user) }}"
                                                            class="menu-link px-3 btn-edit">Edit</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="" class="menu-link px-3 btn-delete"
                                                            data-user-id="{{ $user->id }}">Delete</a>
                                                    </div>
                                            </td>
                                        </tr>
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
<!-- Modal Tambah User -->
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ route('member.store') }}" method="POST" id="kt_modal_add_customer_form"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <h2 class="fw-bold">Tambah User Baru</h2>
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary"
                        data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>

                <div class="modal-body py-10 px-lg-17">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                        <!-- Notice -->
                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Detail pengguna akan dicatat dalam sistem. Untuk
                                        informasi lebih lanjut, silakan baca
                                        <a href="#">Kebijakan Privasi</a> kami</div>
                                </div>
                            </div>
                        </div>

                        <!-- User Details -->
                        <div class="fw-bold fs-3 rotate collapsible mb-7" href="#kt_modal_add_customer_user_info"
                            role="button" aria-expanded="true" aria-controls="kt_modal_add_customer_user_info">Detail
                            Akun Pengguna
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>

                        <div id="kt_modal_add_customer_user_info" class="collapse show">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Nama</label>
                                <input type="text" class="form-control form-control-solid" name="name"
                                    value="{{ old('name') }}" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Email</label>
                                <input type="email" class="form-control form-control-solid" name="email"
                                    value="{{ old('email') }}" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Password</label>
                                <input type="password" class="form-control form-control-solid" name="password"
                                    required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Konfirmasi Password</label>
                                <input type="password" class="form-control form-control-solid"
                                    name="password_confirmation" required />
                            </div>
                        </div>

                        <!-- Profile Details -->
                        <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                            href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false"
                            aria-controls="kt_modal_add_customer_billing_info">Detail Profil
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>

                        <div id="kt_modal_add_customer_billing_info" class="collapse">
                            <div class="mb-7">
                                <label class="fs-6 fw-semibold mb-2">
                                    <span>Avatar</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        title="Format file yang diizinkan: png, jpg, jpeg.">
                                        <i class="ki-duotone ki-information fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <div class="mt-1">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Pilih avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Hapus avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Nama Lengkap</label>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <input type="text" name="first_name" class="form-control form-control-solid"
                                                placeholder="Nama Depan" value="{{ old('first_name') }}" required />
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="last_name" class="form-control form-control-solid"
                                                placeholder="Nama Belakang" value="{{ old('last_name') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Kelas</label>
                                    <select class="form-select form-select-solid" data-control="select2" name="kelas"
                                        required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <optgroup label="Kelas X">
                                            <option value="X TO 1">X TO 1</option>
                                            <option value="X TO 2">X TO 2</option>
                                            <option value="X TO 3">X TO 3</option>
                                            <option value="X TE 1">X TE 1</option>
                                            <option value="X TE 2">X TE 2</option>
                                            <option value="X PPLG 1">X PPLG 1</option>
                                            <option value="X PPLG 2">X PPLG 2</option>
                                            <option value="X PPLG 3">X PPLG 3</option>
                                            <option value="X TJKT 1">X TJKT 1</option>
                                            <option value="X TJKT 2">X TJKT 2</option>
                                            <option value="X TJKT 3">X TJKT 3</option>
                                        </optgroup>
                                        <optgroup label="Kelas XI">
                                            <option value="XI TKR 1">XI TKR 1</option>
                                            <option value="XI TKR 2">XI TKR 2</option>
                                            <option value="XI TKR 3">XI TKR 3</option>
                                            <option value="XI AE 1">XI AE 1</option>
                                            <option value="XI AE 2">XI AE 2</option>
                                            <option value="XI RPL 1">XI RPL 1</option>
                                            <option value="XI RPL 2">XI RPL 2</option>
                                            <option value="XI RPL 3">XI RPL 3</option>
                                            <option value="XI TKJ 1">XI TKJ 1</option>
                                            <option value="XI TKJ 2">XI TKJ 2</option>
                                            <option value="XI TKJ 3">XI TKJ 3</option>
                                        </optgroup>
                                        <optgroup label="Kelas XII">
                                            <option value="XII TKR 1">XII TKR 1</option>
                                            <option value="XII TKR 2">XII TKR 2</option>
                                            <option value="XII AE 1">XII AE 1</option>
                                            <option value="XII AE 2">XII AE 2</option>
                                            <option value="XII RPL 1">XII RPL 1</option>
                                            <option value="XII RPL 2">XII RPL 2</option>
                                            <option value="XII TKJ 1">XII TKJ 1</option>
                                            <option value="XII TKJ 2">XII TKJ 2</option>
                                            <option value="XII TKJ 3">XII TKJ 3</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control form-control-solid"
                                        value="{{ old('tanggal_lahir') }}" required />
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Alamat</label>
                                    <textarea name="alamat" class="form-control form-control-solid"
                                        required>{{ old('alamat') }}</textarea>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Nomor Telepon</label>
                                    <input type="tel" name="no_telepon" class="form-control form-control-solid"
                                        value="{{ old('no_telepon') }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-user">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize DataTable
        const tabel = new DataTable('#tabel_users');

        // Implementasi pencarian
        const searchInput = document.querySelector('[data-kt-users-table-filter="search"]');
        if (searchInput) {
            searchInput.addEventListener('keyup', function (e) {
                tabel.search(this.value).draw();
            });
        }
    });

</script>

<script>
    // Konfirmasi delete user - menangkap kedua jenis tombol delete
    $(document).on('click', '#btn-delete-user, .btn-delete', function (e) {
        e.preventDefault();

        // Ambil user ID dari elemen yang diklik
        // Cek apakah menggunakan data-user-id atau data-id
        const userId = $(this).data('user-id') || $(this).data('id');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Buat form delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/member/${userId}`;
                form.style.display = 'none';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = $('meta[name="csrf-token"]').attr('content');

                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrfToken);
                form.appendChild(method);
                document.body.appendChild(form);

                form.submit();
            }
        });
    });

</script>
<script>
    // Inisialisasi komponen pada modal tambah user
    document.addEventListener('DOMContentLoaded', function () {
        // Reset form saat modal ditutup
        $('#kt_modal_add_customer').on('hidden.bs.modal', function () {
            $('#kt_modal_add_customer_form').trigger('reset');
            // Reset image jika ada
            $('.image-input').imageInput('reset');
        });

        // Inisialisasi Select2 jika dibutuhkan
        if (typeof $.fn.select2 !== 'undefined') {
            $('[data-control="select2"]').select2({
                dropdownParent: $('#kt_modal_add_customer')
            });
        }
    });

</script>
@endsection
