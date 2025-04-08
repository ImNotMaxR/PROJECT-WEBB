@extends('master.master')
@section('title', 'Kelola User')

@section('content')

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Container-->
            <div class="container-xxl d-flex flex-grow-1 flex-stack">
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-xl-row">
                            <!--begin::Sidebar-->
                            <div class="flex-lg-row-fluid ms-lg-15">
                                <!--begin::Card-->
                                <div class="card mb-5 mb-xl-8">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-15">
                                        <!--begin::Summary-->
                                        <div class="d-flex flex-center flex-column mb-5">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-100px symbol mb-7">
                                                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/media/avatars/blank.png') }}"
                                                    alt="image" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            </a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="fs-5 fw-semibold text-muted mb-6">
                                                {{ $user->kelas ?? 'Tidak Ada Kelas' }}</div>
                                            <!--end::Position-->
                                        </div>
                                        <!--end::Summary-->

                                        <!--begin::Details toggle-->
                                        <div class="d-flex flex-stack fs-4 py-3">
                                            <div class="fw-bold rotate collapsible"
                                                href="#kt_customer_view_details" role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_details">Details
                                                <span class="ms-2 rotate-180">
                                                    <i class="ki-duotone ki-down fs-3"></i>
                                                </span>
                                            </div>
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                title="Edit customer details">
                                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_customer">Edit</a>
                                            </span>
                                        </div>
                                        <!--end::Details toggle-->

                                        <div class="separator separator-dashed my-3"></div>

                                        <!--begin::Details content-->
                                        <div id="kt_customer_view_details" class="collapse show">
                                            <div class="py-5 fs-6">
                                                <div class="fw-bold mt-5">Email</div>
                                                <div class="text-gray-600">{{ $user->email }}</div>

                                                <div class="fw-bold mt-5">Tanggal Lahir</div>
                                                <div class="text-gray-600">{{ $user->tanggal_lahir ?? '-' }}</div>

                                                <div class="fw-bold mt-5">Alamat</div>
                                                <div class="text-gray-600">{{ $user->alamat ?? '-' }}</div>

                                                <div class="fw-bold mt-5">No. Telepon</div>
                                                <div class="text-gray-600">{{ $user->no_telepon ?? '-' }}</div>
                                            </div>
                                        </div>
                                        <!--end::Details content-->

                                        <div class="d-flex flex-stack fs-4 py-3">
                                            <div class="fw-bold">
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover">
                                                    <a href="{{ route('member.index') }}"
                                                        class="btn btn-sm btn-light">Kembali</a>
                                                </span>
                                            </div>
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                title="Delete Akun User Ini">
                                                <a href="#" class="btn btn-sm btn-light-danger" id="btn-delete-user" data-user-id="{{ $user->id }}">Delete</a>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Sidebar-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Page-->
</div>
<!--begin::Modals-->
<!--begin::Modal - Update User-->
<div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="{{ route('member.update', $user->id) }}" method="POST" id="kt_modal_update_customer_form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update Akun</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
                        
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Pembaruan detail pengguna akan dicatat dalam sistem. Untuk informasi lebih lanjut, silakan baca
                                        <a href="#">Kebijakan Privasi</a> kami</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        
                        <!--begin::User toggle-->
                        <div class="fw-bold fs-3 rotate collapsible mb-7"
                            href="#kt_modal_update_customer_user_info" role="button" aria-expanded="true"
                            aria-controls="kt_modal_update_customer_user_info">Detail Akun Pengguna
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                        <!--end::User toggle-->
                        
                        <div id="kt_modal_update_customer_user_info" class="collapse show">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Nama</label>
                                <input type="text" class="form-control form-control-solid" name="name"
                                    value="{{ old('name', $user->name) }}" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Email</label>
                                <input type="hidden" name="original_email" value="{{ $user->email }}">
                                <input type="email" class="form-control form-control-solid" name="email"
                                    value="{{ old('email', $user->email) }}" />
                            </div>
                            @if (Auth::user()->role == 'superadmin')
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Role</label>
                                <select class="form-select form-select-solid" name="role" data-control="select2">
                                    <option value="" disabled>Pilih Role</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                                    <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                                </select>
                            </div>
                            @endif
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Password Baru (opsional)</label>
                                <input type="password" class="form-control form-control-solid" name="password" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Konfirmasi Password</label>
                                <input type="password" class="form-control form-control-solid" name="password_confirmation" />
                            </div>
                        </div>
                        
                        <!--begin::Profile Details Form-->
                        <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                            href="#kt_modal_update_customer_billing_info" role="button" aria-expanded="false"
                            aria-controls="kt_modal_update_customer_billing_info">Detail Profil
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                        <!--end::Profile Details Form-->
                        
                        <!--begin::Profile Details Form-->
                        <div id="kt_modal_update_customer_billing_info" class="collapse">
                            <!--begin::Input group-->
                            <div class="mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">
                                    <span>Update Avatar</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        title="Format file yang diizinkan: png, jpg, jpeg.">
                                        <i class="ki-duotone ki-information fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Image input wrapper-->
                                <div class="mt-1">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/media/svg/avatars/blank.svg') }}')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Edit-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Ganti avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Batal">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Hapus avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Image input wrapper-->
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Nama Lengkap</label>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3 mb-lg-0">
                                            <input type="text" name="first_name" class="form-control form-control-solid"
                                                placeholder="Nama Depan" value="{{ old('first_name', $user->first_name) }}"
                                                required />
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="last_name" class="form-control form-control-solid"
                                                placeholder="Nama Belakang"
                                                value="{{ old('last_name', $user->last_name) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Kelas</label>
                                    <select class="form-select form-select-solid" data-control="select2" name="kelas" required>
                                        <option value="" disabled>Pilih Kelas</option>
                                        <option></option>
                                        <optgroup label="Kelas X">
                                            <option value="X TO 1"
                                                {{ $user->kelas == 'X TO 1' ? 'selected' : '' }}>X TO 1
                                            </option>
                                            <option value="X TO 2"
                                                {{ $user->kelas == 'X TO 2' ? 'selected' : '' }}>X TO 2
                                            </option>
                                            <option value="X TO 3"
                                                {{ $user->kelas == 'X TO 3' ? 'selected' : '' }}>X TO 3
                                            </option>
                                            <option value="X TE 1"
                                                {{ $user->kelas == 'X TE 1' ? 'selected' : '' }}>X TE 1
                                            </option>
                                            <option value="X TE 2"
                                                {{ $user->kelas == 'X TE 2' ? 'selected' : '' }}>X TE 2
                                            </option>
                                            <option value="X PPLG 1"
                                                {{ $user->kelas == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1
                                            </option>
                                            <option value="X PPLG 2"
                                                {{ $user->kelas == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2
                                            </option>
                                            <option value="X PPLG 3"
                                                {{ $user->kelas == 'X PPLG 3' ? 'selected' : '' }}>X PPLG 3
                                            </option>
                                            <option value="X TJKT 1"
                                                {{ $user->kelas == 'X TJKT 1' ? 'selected' : '' }}>X TJKT 1
                                            </option>
                                            <option value="X TJKT 2"
                                                {{ $user->kelas == 'X TJKT 2' ? 'selected' : '' }}>X TJKT 2
                                            </option>
                                            <option value="X TJKT 3"
                                                {{ $user->kelas == 'X TJKT 3' ? 'selected' : '' }}>X TJKT 3
                                            </option>
                                        </optgroup>
                                        <optgroup label="Kelas XI">
                                            <option value="XI TKR 1"
                                                {{ $user->kelas == 'XI TKR 1' ? 'selected' : '' }}>XI TKR 1
                                            </option>
                                            <option value="XI TKR 2"
                                                {{ $user->kelas == 'XI TKR 2' ? 'selected' : '' }}>XI TKR 2
                                            </option>
                                            <option value="XI TKR 3"
                                                {{ $user->kelas == 'XI TKR 3' ? 'selected' : '' }}>XI TKR 3
                                            </option>
                                            <option value="XI AE 1"
                                                {{ $user->kelas == 'XI AE 1' ? 'selected' : '' }}>XI AE 1
                                            </option>
                                            <option value="XI AE 2"
                                                {{ $user->kelas == 'XI AE 2' ? 'selected' : '' }}>XI AE 2
                                            </option>
                                            <option value="XI RPL 1"
                                                {{ $user->kelas == 'XI RPL 1' ? 'selected' : '' }}>XI RPL 1
                                            </option>
                                            <option value="XI RPL 2"
                                                {{ $user->kelas == 'XI RPL 2' ? 'selected' : '' }}>XI RPL 2
                                            </option>
                                            <option value="XI RPL 3"
                                                {{ $user->kelas == 'XI RPL 3' ? 'selected' : '' }}>XI RPL 3
                                            </option>
                                            <option value="XI TKJ 1"
                                                {{ $user->kelas == 'XI TKJ 1' ? 'selected' : '' }}>XI TKJ 1
                                            </option>
                                            <option value="XI TKJ 2"
                                                {{ $user->kelas == 'XI TKJ 2' ? 'selected' : '' }}>XI TKJ 2
                                            </option>
                                            <option value="XI TKJ 3"
                                                {{ $user->kelas == 'XI TKJ 3' ? 'selected' : '' }}>XI TKJ 3
                                            </option>
                                        </optgroup>
                                        <optgroup label="Kelas XII">
                                            <option value="XII TKR 1"
                                                {{ $user->kelas == 'XII TKR 1' ? 'selected' : '' }}>XII TKR 1
                                            </option>
                                            <option value="XII TKR 2"
                                                {{ $user->kelas == 'XII TKR 2' ? 'selected' : '' }}>XII TKR 2
                                            </option>
                                            <option value="XII AE 1"
                                                {{ $user->kelas == 'XII AE 1' ? 'selected' : '' }}>XII AE 1
                                            </option>
                                            <option value="XII AE 2"
                                                {{ $user->kelas == 'XII AE 2' ? 'selected' : '' }}>XII AE 2
                                            </option>
                                            <option value="XII RPL 1"
                                                {{ $user->kelas == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1
                                            </option>
                                            <option value="XII RPL 2"
                                                {{ $user->kelas == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2
                                            </option>
                                            <option value="XII TKJ 1"
                                                {{ $user->kelas == 'XII TKJ 1' ? 'selected' : '' }}>XII TKJ 1
                                            </option>
                                            <option value="XII TKJ 2"
                                                {{ $user->kelas == 'XII TKJ 2' ? 'selected' : '' }}>XII TKJ 2
                                            </option>
                                            <option value="XII TKJ 3"
                                                {{ $user->kelas == 'XII TKJ 3' ? 'selected' : '' }}>XII TKJ 3
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control form-control-solid"
                                        value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required />
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Alamat</label>
                                    <textarea name="alamat" class="form-control form-control-solid"
                                        required>{{ old('alamat', $user->alamat) }}</textarea>
                                </div>
                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="form-label fs-6 fw-bold required">Nomor Telepon</label>
                                    <input type="tel" name="no_telepon" class="form-control form-control-solid"
                                        value="{{ old('no_telepon', $user->no_telepon) }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-primary" id="btn-update-user">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
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


@endsection

@section('script')
<script>
    // Tambahkan script ini di bagian bawah halaman atau dalam file JS terpisah
$(document).ready(function() {
    // Pastikan datepicker untuk tanggal lahir aktif (jika menggunakan datepicker)
    $('input[name="tanggal_lahir"]').flatpickr({
        dateFormat: "Y-m-d",
        allowInput: true
    });

    // Konfirmasi update user
    $('#btn-update-user').on('click', function(e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Konfirmasi Update',
            text: "Apakah Anda yakin ingin memperbarui data pengguna ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Perbarui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#kt_modal_update_customer_form').submit();
            }
        });
    });

    // Konfirmasi delete user
    $('#btn-delete-user').on('click', function(e) {
        e.preventDefault();
        
        const userId = $(this).data('user-id');
        
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

    // Initialize image input component
    var avatar = new KTImageInput('kt_image_input_avatar');

    // Tambahkan CSS untuk animasi rotate
    $('<style>.rotate-180.active { transform: rotate(180deg); transition: transform 0.3s; }</style>').appendTo('head');
});
</script>
@endsection
