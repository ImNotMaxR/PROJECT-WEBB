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
                                            style="{{ Storage::url($user->foto) }}"></div>
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
                    </div>
                </div>
                <!--end::Navbar-->
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
                                <div class="row mb-6">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->

                                                <div class="image-input-wrapper w-125px h-125px"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel avatar">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove avatar">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ old('name', $user->name) }}" required />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                    <div class="col-lg-8">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ old('email', $user->email) }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Basic info-->

                <!--begin::Sign-in Method-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Sign-in Method</h3>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <div class="card-body border-top p-9">
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
                                    <form method="POST" action="{{ route('profile.update') }}" id="email_form">
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
                                    <form method="POST" action="{{ route('profile.update') }}" id="password_form">
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
                <!--end::Sign-in Method-->

                <!--begin::Deactivate Account-->
                <div class="card">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_deactivate">
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
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button id="kt_account_deactivate_account_submit" type="submit"
                                    class="btn btn-danger fw-semibold">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Deactivate Account-->
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
                <h2 class="fw-bold">Error Occurred!</h2>
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
@endif
<script>
    <!--begin::Javascript
    -->
<script>
    var hostUrl = "assets/";

</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/account/settings/signin-methods.js"></script>
<script src="assets/js/custom/account/settings/profile-details.js"></script>
<script src="assets/js/custom/account/settings/Delete-account.js"></script>
<script src="assets/js/custom/pages/user-profile/general.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="assets/js/custom/utilities/modals/two-factor-authentication.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</script>

@endsection

@section('scripts')
@if ($errors->any())

<script>
    // Toggle email edit form
    document.querySelector('#kt_signin_email_button button').addEventListener('click', function () {
        document.querySelector('#kt_signin_email_edit').classList.remove('d-none');
        document.querySelector('#kt_signin_email').classList.add('d-none');
        document.querySelector('#kt_signin_email_button').classList.add('d-none');
    });

    document.querySelector('#kt_signin_cancel').addEventListener('click', function () {
        document.querySelector('#kt_signin_email_edit').classList.add('d-none');
        document.querySelector('#kt_signin_email').classList.remove('d-none');
        document.querySelector('#kt_signin_email_button').classList.remove('d-none');
    });

    // Toggle password edit form
    document.querySelector('#kt_signin_password_button button').addEventListener('click', function () {
        document.querySelector('#kt_signin_password_edit').classList.remove('d-none');
        document.querySelector('#kt_signin_password').classList.add('d-none');
        document.querySelector('#kt_signin_password_button').classList.add('d-none');
    });

    document.querySelector('#kt_password_cancel').addEventListener('click', function () {
        document.querySelector('#kt_signin_password_edit').classList.add('d-none');
        document.querySelector('#kt_signin_password').classList.remove('d-none');
        document.querySelector('#kt_signin_password_button').classList.remove('d-none');
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorModal = new bootstrap.Modal(document.getElementById('kt_modal_errors'));
        errorModal.show();
    });

</script>
@endif
@endsection
