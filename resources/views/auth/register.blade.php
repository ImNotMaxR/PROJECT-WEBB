<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<style>
    body {
        opacity: 0;
        animation: fadeIn 2s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

</style>
@include('master.header')

<body id="kt_body" class="auth-bg">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Body-->
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

    <body id="kt_body" class="app-blank">
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Authentication - Sign-up -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                    <!--begin::Form-->
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10">
                            <!--begin::Form-->
                            <form class="form w-100" id="kt_sign_up_form" action="{{ route('register') }}"
                                method="POST">
                                @csrf

                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <h1 class="text-dark fw-bolder mb-3">Buat Akun</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">CiroBooks.com</div>
                                </div>
                                <!--end::Heading-->

                                <!-- Name -->
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Nama" name="name" id="name"
                                        class="form-control bg-transparent" value="{{ old('name') }}" required autofocus
                                        autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="fv-row mb-8">
                                    <input type="email" placeholder="Email" name="email" id="email"
                                        class="form-control bg-transparent" value="{{ old('email') }}" required
                                        autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="fv-row mb-8" data-kt-password-meter="true">
                                    <div class="mb-1">
                                        <div class="position-relative mb-3">
                                            <input class="form-control bg-transparent" type="password"
                                                placeholder="Password" name="password" id="password"
                                                autocomplete="new-password" required />
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="ki-duotone ki-eye-slash fs-2"></i>
                                                <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                    </div>
                                    <div class="text-muted">Gunakan 8 atau Lebih Dengan Campuran Kata, Nomor Dan Simbol.
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Hidden Role Input -->
                                <input type="hidden" name="role" value="user" />

                                <!-- Confirm Password -->
                                <div class="fv-row mb-8">
                                    <input placeholder="Ulangi Password" name="password_confirmation" type="password"
                                        id="password_confirmation" autocomplete="new-password"
                                        class="form-control bg-transparent" required />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- Terms -->
                                <div class="fv-row mb-8">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="terms" value="1"
                                            required />
                                        <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Aku Terima
                                            <a href="#" class="ms-1 link-primary">Persyaratan</a>
                                        </span>
                                    </label>
                                    <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                                </div>

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                        <span class="indicator-label">Buat Akun</span>
                                        <span class="indicator-progress">Tunggu...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Submit button-->

                                <div class="text-gray-500 text-center fw-semibold fs-6">Sudah Punya Akun?
                                    <a href="{{ route('login') }}" class="link-primary fw-semibold">Masuk</a>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Form-->
                    <!--begin::Footer-->
                    <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">


                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
                <!--begin::Aside-->
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                    style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
                    <!--begin::Content-->
                    <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                        <!--begin::Logo-->
                        <a href="/" class="mb-0 mb-lg-12">
                            <img alt="Logo" src="{{ asset('assets/media/logos/custom-1.png') }}"
                                class="h-60px h-lg-75px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Image-->
                        <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                            src="{{ asset('assets/media/misc/SCREEEN.png') }}" alt="" />
                        <!--end::Image-->
                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Cepat, Efisien dan
                            Produktif</h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="d-none d-lg-block text-white fs-base text-center">
                            Selamat datang di CiroBooks<br />
                            Sistem Perpustakaan yang<br />
                            Efisien Dan Produktif
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Aside-->
            </div>
            <!--end::Authentication - Sign-up-->
        </div>
        @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Removing the novalidate attribute to allow HTML5 validation
                var form = document.getElementById('kt_sign_up_form');
                if (form) {
                    form.removeAttribute('novalidate');

                    // Override Metronic's default form submission behavior
                    var submitButton = document.getElementById('kt_sign_up_submit');

                    form.addEventListener('submit', function (e) {
                        // Show the loading indicator
                        if (submitButton) {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;
                        }

                        // Allow the form to submit naturally
                        return true;
                    });
                }
            });

        </script>

        <script> var hostUrl = "assets/"; </script>

        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>

        <script src="assets/js/custom/authentication/sign-up/general.js"></script>


        @endsection
    </body>
    <!--end::Body-->

</html>
