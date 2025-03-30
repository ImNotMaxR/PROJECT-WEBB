@extends('master.master')

@section('content')

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin::Profile pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/media/svg/avatars/blank.svg') }}')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Profile pic-->

                            <!--begin::User info-->
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a
                                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                                            <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <i
                                                    class="ki-outline ki-profile-circle fs-4 me-1"></i>{{ $user->role ?? 'User' }}
                                            </a>
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <i class="ki-outline ki-sms fs-4 me-1"></i>{{ $user->email }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold">{{ $totalPeminjaman ?? 0 }}</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Buku Yang Di Pinjam</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User info-->
                        </div>
                        <!--begin::Navs-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5"
                                    href="{{route('profile.index')}}">Overview</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                    href="{{route('profile.edit')}}">Settings</a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--begin::Navs-->
                    </div>
                </div>
                <!--end::Navbar-->


                <!--begin::FORM PROFILE DETAILS EDIT UNTUK TABEL USERS_PROFILE-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form class="form" method="POST" action="{{ route('profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="card-body border-top p-9">
                                <!-- Avatar -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                    <div class="col-lg-8">
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('{{ asset('assets/media/avatars/blank.png') }}');
                                            }

                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('{{ asset('assets/media/avatars/blank.png') }}');
                                            }

                                        </style>
                                        <div class="image-input image-input-outline @if(!$user->avatar) image-input-empty image-input-placeholder @endif"
                                            data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px" @if($user->avatar)
                                                style="background-image: url('{{ asset('storage/' . $user->avatar) }}')"
                                                @endif></div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" value="0" />
                                            </label>
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                                data-kt-initialized="1">
                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                        </div>

                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">
                                            Hanya file avatar *.png, *.jpg dan *.jpeg yang diterima</div>
                                        @error('avatar')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <!--end::Description-->
                                    </div>
                                </div>

                                <!-- Full Name -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                    <div class="col-lg-8 row">
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="fname"
                                                class="form-control form-control-lg form-control-solid mb-3"
                                                placeholder="First name"
                                                value="{{ old('fname', $user->first_name) }}" />
                                        </div>
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="lname"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Last name" value="{{ old('lname', $user->last_name) }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Kelas -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kelas</label>
                                    <div class="col-lg-8">
                                        <select class="form-select form-select-solid" name="kelas"
                                            data-control="select2" data-placeholder="Pilih Kelas">
                                            <option></option>

                                            <optgroup label="Kelas X">
                                                <option value="X TO 1"
                                                    {{ Auth::user()->kelas == 'X TO 1' ? 'selected' : '' }}>X TO 1
                                                </option>
                                                <option value="X TO 2"
                                                    {{ Auth::user()->kelas == 'X TO 2' ? 'selected' : '' }}>X TO 2
                                                </option>
                                                <option value="X TO 3"
                                                    {{ Auth::user()->kelas == 'X TO 3' ? 'selected' : '' }}>X TO 3
                                                </option>
                                                <option value="X TE 1"
                                                    {{ Auth::user()->kelas == 'X TE 1' ? 'selected' : '' }}>X TE 1
                                                </option>
                                                <option value="X TE 2"
                                                    {{ Auth::user()->kelas == 'X TE 2' ? 'selected' : '' }}>X TE 2
                                                </option>
                                                <option value="X PPLG 1"
                                                    {{ Auth::user()->kelas == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1
                                                </option>
                                                <option value="X PPLG 2"
                                                    {{ Auth::user()->kelas == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2
                                                </option>
                                                <option value="X PPLG 3"
                                                    {{ Auth::user()->kelas == 'X PPLG 3' ? 'selected' : '' }}>X PPLG 3
                                                </option>
                                                <option value="X TJKT 1"
                                                    {{ Auth::user()->kelas == 'X TJKT 1' ? 'selected' : '' }}>X TJKT 1
                                                </option>
                                                <option value="X TJKT 2"
                                                    {{ Auth::user()->kelas == 'X TJKT 2' ? 'selected' : '' }}>X TJKT 2
                                                </option>
                                                <option value="X TJKT 3"
                                                    {{ Auth::user()->kelas == 'X TJKT 3' ? 'selected' : '' }}>X TJKT 3
                                                </option>
                                            </optgroup>
                                            <optgroup label="Kelas XI">
                                                <option value="XI TKR 1"
                                                    {{ Auth::user()->kelas == 'XI TKR 1' ? 'selected' : '' }}>XI TKR 1
                                                </option>
                                                <option value="XI TKR 2"
                                                    {{ Auth::user()->kelas == 'XI TKR 2' ? 'selected' : '' }}>XI TKR 2
                                                </option>
                                                <option value="XI TKR 3"
                                                    {{ Auth::user()->kelas == 'XI TKR 3' ? 'selected' : '' }}>XI TKR 3
                                                </option>
                                                <option value="XI AE 1"
                                                    {{ Auth::user()->kelas == 'XI AE 1' ? 'selected' : '' }}>XI AE 1
                                                </option>
                                                <option value="XI AE 2"
                                                    {{ Auth::user()->kelas == 'XI AE 2' ? 'selected' : '' }}>XI AE 2
                                                </option>
                                                <option value="XI RPL 1"
                                                    {{ Auth::user()->kelas == 'XI RPL 1' ? 'selected' : '' }}>XI RPL 1
                                                </option>
                                                <option value="XI RPL 2"
                                                    {{ Auth::user()->kelas == 'XI RPL 2' ? 'selected' : '' }}>XI RPL 2
                                                </option>
                                                <option value="XI RPL 3"
                                                    {{ Auth::user()->kelas == 'XI RPL 3' ? 'selected' : '' }}>XI RPL 3
                                                </option>
                                                <option value="XI TKJ 1"
                                                    {{ Auth::user()->kelas == 'XI TKJ 1' ? 'selected' : '' }}>XI TKJ 1
                                                </option>
                                                <option value="XI TKJ 2"
                                                    {{ Auth::user()->kelas == 'XI TKJ 2' ? 'selected' : '' }}>XI TKJ 2
                                                </option>
                                                <option value="XI TKJ 3"
                                                    {{ Auth::user()->kelas == 'XI TKJ 3' ? 'selected' : '' }}>XI TKJ 3
                                                </option>
                                            </optgroup>
                                            <optgroup label="Kelas XII">
                                                <option value="XII TKR 1"
                                                    {{ Auth::user()->kelas == 'XII TKR 1' ? 'selected' : '' }}>XII TKR 1
                                                </option>
                                                <option value="XII TKR 2"
                                                    {{ Auth::user()->kelas == 'XII TKR 2' ? 'selected' : '' }}>XII TKR 2
                                                </option>
                                                <option value="XII AE 1"
                                                    {{ Auth::user()->kelas == 'XII AE 1' ? 'selected' : '' }}>XII AE 1
                                                </option>
                                                <option value="XII AE 2"
                                                    {{ Auth::user()->kelas == 'XII AE 2' ? 'selected' : '' }}>XII AE 2
                                                </option>
                                                <option value="XII RPL 1"
                                                    {{ Auth::user()->kelas == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1
                                                </option>
                                                <option value="XII RPL 2"
                                                    {{ Auth::user()->kelas == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2
                                                </option>
                                                <option value="XII TKJ 1"
                                                    {{ Auth::user()->kelas == 'XII TKJ 1' ? 'selected' : '' }}>XII TKJ 1
                                                </option>
                                                <option value="XII TKJ 2"
                                                    {{ Auth::user()->kelas == 'XII TKJ 2' ? 'selected' : '' }}>XII TKJ 2
                                                </option>
                                                <option value="XII TKJ 3"
                                                    {{ Auth::user()->kelas == 'XII TKJ 3' ? 'selected' : '' }}>XII TKJ 3
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal
                                        Lahir</label>
                                    <div class="col-lg-8">
                                        <input type="number" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control form-control-solid" min="1900" max="{{ date('Y') }}"
                                            placeholder="Masukkan Tahun Terbit"
                                            value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>



                                <!-- Alamat -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Alamat</label>
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="alamat" class="form-control form-control-solid"
                                            data-kt-autosize="true">{{ old('alamat', $user->alamat) }}</textarea>
                                    </div>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Nomor
                                        Telepon</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="no_telepon"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="no_telepon number"
                                            value="{{ old('no_telepon', $user->no_telepon) }}" />
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--begin::Account Details-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Account Details</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <div class="card-body border-top p-9">
                            <!--begin::User Name-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_name">
                                    <div class="fs-6 fw-bold mb-1">User Name Account</div>
                                    <div class="fw-semibold text-gray-600">{{ Auth::user()->name }}</div>
                                </div>
                                <!--end::Label-->

                                <!-- Username Form -->
                                <div id="kt_signin_name_edit" class="flex-row-fluid d-none">
                                    <!-- begin::Form -->
                                    <form method="POST" action="{{ route('profile.update.account') }}" id="name_form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="name" class="form-label fs-6 fw-bold mb-3">Enter New
                                                        UserName</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                                        id="name" name="name"
                                                        value="{{ old('name', Auth::user()->name) }}" />
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="current_password_name"
                                                        class="form-label fs-6 fw-bold mb-3">Confirm Current
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                                        name="current_password" id="current_password_name" />
                                                    @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary me-2 px-6">Update
                                                Username</button>
                                            <button type="button"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6"
                                                id="cancel_name_button">Cancel</button>
                                        </div>
                                    </form>
                                    <!-- end::Form -->
                                </div>
                                <!--end::Edit-->

                                <!--begin::Action-->
                                <div id="kt_signin_name_button" class="ms-auto">
                                    <button type="button" class="btn btn-light btn-active-light-primary"
                                        id="change_name_button">Change User Name</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::User Name-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->

                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                                    <div class="fw-semibold text-gray-600">{{ Auth::user()->email }}</div>
                                </div>
                                <!--end::Label-->

                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form method="POST" action="{{ route('profile.update.account') }}" id="email_form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="email" class="form-label fs-6 fw-bold mb-3">Enter New
                                                        Email Address</label>
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                                        id="email" name="email"
                                                        value="{{ old('email', Auth::user()->email) }}" />
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="current_password_email"
                                                        class="form-label fs-6 fw-bold mb-3">Confirm Current
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                                        name="current_password" id="current_password_email" />
                                                    @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary me-2 px-6">Update
                                                Email</button>
                                            <button type="button"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6"
                                                id="cancel_email_button">Cancel</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->

                                <!--begin::Action-->
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button type="button" class="btn btn-light btn-active-light-primary"
                                        id="change_email_button">Change Email</button>
                                </div>
                                <!--end::Action-->

                            </div>
                            <!--end::Email Address-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->

                            <!--begin::Password-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Label-->
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bold mb-1">Password</div>
                                    <div class="fw-semibold text-gray-600">********</div>
                                </div>
                                <!--end::Label-->

                                <!--begin::Edit-->
                                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form method="POST" action="{{ route('profile.update.account') }}"
                                        id="password_form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="current_password"
                                                        class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                                        name="current_password" id="current_password" />
                                                    @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="password" class="form-label fs-6 fw-bold mb-3">New
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                                        name="password" id="password" />
                                                    @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="password_confirmation"
                                                        class="form-label fs-6 fw-bold mb-3">Confirm New
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="password_confirmation" id="password_confirmation" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">Password must be at least 8 characters and contain
                                            symbols</div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary me-2 px-6">Update
                                                Password</button>
                                            <button type="button"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6"
                                                id="cancel_password_button">Cancel</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->

                                <!--begin::Action-->
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button type="button" class="btn btn-light btn-active-light-primary"
                                        id="change_password_button">Reset Password</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Password-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Account Details-->

                <!--begin::Deactivate Account-->
                <div class="card">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_settings_deactivate">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Delete Account</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_deactivate" class="collapse show">
                        <form id="kt_account_deactivate_form" class="form" method="POST"
                            action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <div class="card-body border-top p-9">
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">You Are Deleting Your Account</h4>
                                            <div class="fs-6 text-gray-700">All your data will be permanently removed.
                                                This action cannot be undone.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check form-check-solid fv-row">
                                    <input class="form-check-input" type="checkbox" name="deactivate" id="deactivate"
                                        required />
                                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my
                                        account deletion</label>
                                </div>

                                @error('password', 'userDeletion')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button id="kt_account_deactivate_account_submit" type="button"
                                    class="btn btn-danger fw-semibold">Delete Account</button>
                            </div>

                            <!-- Hidden password field (will be populated via JavaScript) -->
                            <input type="hidden" name="password" id="deletion_password">
                        </form>
                    </div>
                </div>
                <!--end::Deactivate Account-->

                <!-- Confirmation Modal -->
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger fw-bold">Warning: This action cannot be undone!</p>
                                <p>Please enter your password to confirm account deletion:</p>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="confirm_password"
                                        placeholder="Enter your password">
                                    <div id="password_error" class="text-danger mt-2 d-none">Password is required to
                                        continue</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirm_delete_btn">Delete My
                                    Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end::Main-->

@if ($errors->any())
<div class="modal fade" id="kt_modal_errors" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Terdapat Error</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
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

@endif
@endsection


@section('script')

<script>
    $('#tanggal_lahir').flatpickr({
        defaultDate: "{{ old('tanggal_lahir', $user->tanggal_lahir) }}",
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 12)
    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/js/custom/account/settings/signin-methods.js"></script>
<script src="assets/js/custom/account/settings/profile-details.js"></script>
<script src="assets/js/custom/account/settings/Delete-account.js"></script>
<script src="assets/js/custom/pages/user-profile/general.js"></script>

<script>
    // Script untuk mengelola tampilan form
    document.addEventListener('DOMContentLoaded', function () {
        // Username form
        const changeNameButton = document.getElementById('change_name_button');
        const nameDivDisplay = document.getElementById('kt_signin_name');
        const nameFormDiv = document.getElementById('kt_signin_name_edit');
        const nameButtonDiv = document.getElementById('kt_signin_name_button');
        const cancelNameButton = document.querySelector('#kt_signin_name_edit #cancel_name_button');

        // Email form
        const changeEmailButton = document.getElementById('change_email_button');
        const emailDivDisplay = document.getElementById('kt_signin_email');
        const emailFormDiv = document.getElementById('kt_signin_email_edit');
        const emailButtonDiv = document.getElementById('kt_signin_email_button');
        const cancelEmailButton = document.getElementById('cancel_email_button');

        // Password form
        const changePasswordButton = document.getElementById('change_password_button');
        const passwordDivDisplay = document.getElementById('kt_signin_password');
        const passwordFormDiv = document.getElementById('kt_signin_password_edit');
        const passwordButtonDiv = document.getElementById('kt_signin_password_button');
        const cancelPasswordButton = document.getElementById('cancel_password_button');

        // Toggle username form
        changeNameButton.addEventListener('click', function () {
            nameDivDisplay.classList.add('d-none');
            nameButtonDiv.classList.add('d-none');
            nameFormDiv.classList.remove('d-none');
        });

        // Cancel username form
        if (cancelNameButton) {
            cancelNameButton.addEventListener('click', function () {
                nameDivDisplay.classList.remove('d-none');
                nameButtonDiv.classList.remove('d-none');
                nameFormDiv.classList.add('d-none');
            });
        }

        // Toggle email form
        changeEmailButton.addEventListener('click', function () {
            emailDivDisplay.classList.add('d-none');
            emailButtonDiv.classList.add('d-none');
            emailFormDiv.classList.remove('d-none');
        });

        // Cancel email form
        cancelEmailButton.addEventListener('click', function () {
            emailDivDisplay.classList.remove('d-none');
            emailButtonDiv.classList.remove('d-none');
            emailFormDiv.classList.add('d-none');
        });

        // Toggle password form
        changePasswordButton.addEventListener('click', function () {
            passwordDivDisplay.classList.add('d-none');
            passwordButtonDiv.classList.add('d-none');
            passwordFormDiv.classList.remove('d-none');
        });

        // Cancel password form
        cancelPasswordButton.addEventListener('click', function () {
            passwordDivDisplay.classList.remove('d-none');
            passwordButtonDiv.classList.remove('d-none');
            passwordFormDiv.classList.add('d-none');
        });
    });

</script>

<script>
    // Script untuk mengelola modal konfirmasi hapus akun
document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const deleteButton = document.getElementById('kt_account_deactivate_account_submit');
    const deleteForm = document.getElementById('kt_account_deactivate_form');
    const confirmDeleteBtn = document.getElementById('confirm_delete_btn');
    const passwordInput = document.getElementById('confirm_password');
    const passwordError = document.getElementById('password_error');
    const deletionPasswordInput = document.getElementById('deletion_password');
    const confirmCheckbox = document.getElementById('deactivate');
    
    // Jika tombol delete account ada
    if (deleteButton) {
        deleteButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Check if the checkbox is checked
            if (!confirmCheckbox.checked) {
                alert('Please confirm account deletion by checking the confirmation box.');
                return;
            }
            
            // Show modal
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
            deleteModal.show();
        });
    }
    
    // Confirm delete button in modal
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            // Validate password
            if (!passwordInput.value.trim()) {
                passwordError.classList.remove('d-none');
                return;
            }
            
            // Hide error if previously shown
            passwordError.classList.add('d-none');
            
            // Set password to hidden field
            deletionPasswordInput.value = passwordInput.value;
            
            // Submit the form
            deleteForm.submit();
        });
    }
    
    // Clear error when typing in password field
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            passwordError.classList.add('d-none');
        });
    }
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorModal = new bootstrap.Modal(document.getElementById('kt_modal_errors'));
        errorModal.show();
    });

</script>
@endsection
