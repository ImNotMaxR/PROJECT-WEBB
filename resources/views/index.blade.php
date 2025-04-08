@extends('master.master')

@section('content')
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/global/plugins.bundle.js"></script>

<div class="container-fluid p-1">
    <!-- Banner Section -->
    <div id="homeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner w-100">
            @for ($i = 1; $i <= 9; $i++) <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                <img src="{{ asset('assets/media/home/home_bg00' . $i . '.jpg') }}" alt="Banner Webtoon {{ $i }}"
                    class="d-block w-100 img-fluid" style="width: 100vw; height: auto;">
        </div>
        @endfor
    </div>
</div>
</div>
</div>
</div>
<!-- Container  -->
<div class="container py-6">
    <div class="container py-12 d-flex justify-content-center flex-wrap gap-5">
        <a href="{{ route('bukus.index', ['category' => 'Buku Pembelajaran']) }}"
            class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
            <div class="card-body d-flex align-items-center">
                <i class="ki-duotone ki-teacher fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>

                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                    Buku Pembelajaran
                </span>
            </div>
        </a>

        <a href="{{ route('bukus.index', ['category' => 'Novel']) }}"
            class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
            <div class="card-body d-flex align-items-center">
                <i class="ki-duotone ki-book-square fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>

                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                    Novel
                </span>
            </div>
        </a>

        <a href="{{ route('bukus.index', ['category' => 'Komik']) }}"
            class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
            <div class="card-body d-flex align-items-center">
                <i class="ki-duotone ki-book-square fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>

                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                    Komik
                </span>
            </div>
        </a>

        <a href="{{ route('bukus.index', ['category' => 'Dongeng']) }}"
            class="card hover-elevate-up shadow-sm parent-hover" style="width: 250px;">
            <div class="card-body d-flex align-items-center">
                <i class="ki-duotone ki-book-square fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>

                <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                    Dongeng
                </span>
            </div>
        </a>
    </div>



    <div class="container d-flex justify-content-center align-items-center">
        <!--begin::Underline-->
        <span class="d-inline-block position-relative m-1">
            <!--begin::Label-->
            <span class="d-inline-block mb-2 fs-2tx fw-bold text-primary">
                BUKU TERBARU
            </span>
            <!--end::Label-->

            <!--begin::Line-->
            <span
                class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-secondary translate rounded"></span>
            <!--end::Line-->
        </span>
        <!--end::Underline-->
    </div>

    <!-- Book Grid -->
    <div class="row g-4 py-12">
        @foreach ($bukus as $buku)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm h-100">
                <!-- Book Cover -->
                <div class="book-cover my-5">
                    <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid">
                </div>

                <!-- Book Details -->
                <div class="card-body p-4">
                    <div class="separator separator-dashed border-primary my-2"></div>
                    <div class="py-2">
                        <h5 class="fw-bold text-gray-800 mb-2 text-truncate" title="{{ $buku->judul }}">
                            {{ $buku->judul }}
                        </h5>

                        @if($buku->penulis)
                        <div class="text-muted small mb-2">
                            <i class="ki-duotone ki-user me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>{{ $buku->penulis }}
                        </div>
                        @endif


                        {{-- Tampilkan Genre --}}
                        @if($buku->genre)
                        <div class="text-muted small mb-2">
                            <i class="ki-outline ki-bookmark me-1"></i>
                            {{ is_array($buku->genre) ? implode(', ', $buku->genre) : $buku->genre }}
                        </div>
                        @endif


                        @if($buku->tahun_terbit)
                        <div class="text-gray-600 small mb-2">
                            <i class="ki-outline ki-calendar me-1"></i> {{ $buku->tahun_terbit }}
                        </div>
                        @endif
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-sm btn-primary w-100">
                                <i class="fas fa-eye me-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Tombol Lihat Semua Buku -->
        @if ($totalBuku > 8)
        <div class="text-center py-10">
            <a href="{{ route('bukus.index') }}" class="btn btn-lg btn-primary">
                <i class="fas fa-book"></i> Lihat Semua Buku
            </a>
        </div>
        @endif
        <script>
            // Toastr configuration
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

            // Display Toastr based on session messages
            $(document).ready(function () {
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
    </div>
</div>
</div>
</div>

<!-- Onboarding Welcome Modal -->
<div class="modal fade" tabindex="-1" id="kt_modal_welcome">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Selamat Datang!</h3>
            </div>
            <div class="modal-body text-center py-10">
                <div class="mb-5">
                    <i class="ki-duotone ki-verify fs-5x text-primary mb-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <h2 class="mb-3">Terima Kasih Sudah Bergabung!</h2>
                <p class="fs-4 text-gray-600 mb-6">
                    Untuk melengkapi profil Anda, silakan isi beberapa informasi dasar.
                    Ini akan membantu kami menyesuaikan pengalaman Anda.
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-lg btn-primary w-100 mb-2" id="startOnboarding">
                    Lengkapi Profil Anda
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Profile Stepper Modal -->
<div class="modal fade" tabindex="-1" id="kt_modal_profile_stepper">
    <div class="modal-dialog modal-lg">
        <form class="modal-content stepper stepper-pills" id="kt_stepper_profile" method="POST"
            action="{{ route('user.update-profile') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header px-5 py-4">
                <h3 class="modal-title">Lengkapi Profil Anda</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body px-lg-10 px-5 py-10">
                <!-- Stepper Navigation -->
                <div class="stepper-nav flex-center flex-wrap mb-10">
                    <!-- Step 1 -->
                    <div class="stepper-item mx-4 my-2 current" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Informasi Dasar</h3>
                                <div class="stepper-desc">Nama & Kelas</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="stepper-item mx-4 my-2" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Informasi Pribadi</h3>
                                <div class="stepper-desc">Detail Kontak</div>
                            </div>
                        </div>
                        <div class="stepper-line h-40px"></div>
                    </div>

                    <!-- Step 3 -->
                    <div class="stepper-item mx-4 my-2" data-kt-stepper-element="nav">
                        <div class="stepper-wrapper d-flex align-items-center">
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <div class="stepper-label">
                                <h3 class="stepper-title">Foto Profil</h3>
                                <div class="stepper-desc">Personalisasi Akun</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stepper Content -->
                <div class="px-0 py-3">
                    <!-- Step 1 Content -->
                    <div class="flex-column current" data-kt-stepper-element="content">
                        <div class="fs-5 fw-semibold mb-7">Silakan lengkapi nama lengkap dan kelas Anda:</div>

                        <!-- Name Input -->
                        <div class="fv-row mb-8">
                            <label class="form-label fs-6 fw-bold required">Nama Lengkap</label>
                            <div class="row">
                                <div class="col-lg-6 mb-3 mb-lg-0">
                                    <input type="text" name="fname" class="form-control form-control-lg"
                                        placeholder="Nama Depan"
                                        value="{{ old('fname', auth()->user()->first_name ?? '') }}" required />
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="lname" class="form-control form-control-lg"
                                        placeholder="Nama Belakang"
                                        value="{{ old('lname', auth()->user()->last_name ?? '') }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Class Selection -->
                        <div class="fv-row">
                            <label class="form-label fs-6 fw-bold required">Kelas</label>
                            <select class="form-select form-select-lg" name="kelas" data-control="select2"
                                data-placeholder="Pilih Kelas" required>
                                <option></option>
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
                    </div>

                    <!-- Step 2 Content -->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fs-5 fw-semibold mb-7">Silakan lengkapi informasi pribadi Anda:</div>

                        <!-- Date of Birth -->
                        <div class="fv-row mb-8">
                            <label class="form-label fs-6 fw-bold required">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir"
                                class="form-control form-control-lg flatpickr-input" placeholder="Pilih Tanggal Lahir"
                                value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir ?? '') }}" required />
                        </div>

                        <!-- Address Input -->
                        <div class="fv-row mb-8">
                            <label class="form-label fs-6 fw-bold required">Alamat Tempat Tinggal</label>
                            <textarea name="alamat" class="form-control form-control-lg" rows="3"
                                placeholder="Masukkan alamat lengkap Anda"
                                required>{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>
                        </div>

                        <!-- Phone Number -->
                        <div class="fv-row">
                            <label class="form-label fs-6 fw-bold required">Nomor Telepon</label>
                            <input type="tel" name="no_telepon" class="form-control form-control-lg"
                                placeholder="Contoh: 081234567890"
                                value="{{ old('no_telepon', auth()->user()->no_telepon ?? '') }}" required />
                        </div>
                    </div>

                    <!-- Step 3 Content -->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fs-5 fw-semibold mb-7">Unggah foto profil Anda:</div>

                        <!-- Avatar Upload -->
                        <div class="fv-row mb-5 text-center">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Image Input -->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ asset('assets/media/avatars/blank.png') }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ asset('assets/media/avatars/blank.png') }}');
                                    }

                                </style>

                                @auth
                                <div class="image-input image-input-outline image-input-empty image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"
                                        style="background-image: url('{{ auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar) : '' }}')">
                                    </div>
                                    @endauth
                                    <!-- Change Button -->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Ubah avatar">
                                        <i class="ki-outline ki-pencil fs-7"></i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" value="0" />
                                    </label>

                                    <!-- Remove Button -->
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

                                <!-- Guidelines -->
                                <div class="form-text mb-2">Jenis file yang diizinkan: png, jpg, jpeg.</div>
                                <div class="form-text text-muted">Foto profil akan membantu teman dan guru mengenali
                                    Anda</div>
                            </div>
                        </div>

                        <!-- Completion Message -->
                        <div class="d-flex flex-center flex-column mt-10">
                            <div class="text-center mb-5">
                                <i class="ki-duotone ki-check-circle fs-3x text-success">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="text-center">
                                <h4 class="fw-bold mb-0">Langkah Terakhir!</h4>
                                <p class="text-gray-600">Klik tombol Kirim untuk menyelesaikan pendaftaran profil Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Navigation Buttons -->
            <div class="modal-footer flex-center flex-wrap gap-2 px-5 py-4">
                <button type="button" class="btn btn-light me-auto" data-kt-stepper-action="previous">
                    <i class="ki-duotone ki-arrow-left fs-3 me-1"><span class="path1"></span><span
                            class="path2"></span></i>
                    Kembali
                </button>

                <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                    <span class="indicator-label">
                        Kirim
                        <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span
                                class="path2"></span></i>
                    </span>
                    <span class="indicator-progress">
                        Harap tunggu... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>

                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                    Lanjutkan
                    <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0"><span class="path1"></span><span
                            class="path2"></span></i>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection


<style>
    .book-cover {
        width: 100%;
        height: 350px;
        /* Fixed height for book cover */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-radius: 4px 4px 0 0;
    }

    .book-cover img {
        width: auto;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

</style>


@section('script')
<script>
    $('#tanggal_lahir').flatpickr({
        defaultDate: "",
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"), 12)
    });

</script>

<script>
    // Initialize the onboarding flow when page loads
    document.addEventListener('DOMContentLoaded', function () {
        // Check if user has just registered (check for session flash message)

        const hasJustRegistered = {
            {
                session('success') ? 'true' : 'false'
            }
        };

        if (hasJustRegistered || needsOnboarding) {
            localStorage.setItem('needsOnboarding', 'true'); // Simpan status onboarding

            // Tunda sedikit untuk memastikan halaman sudah dimuat sempurna
            setTimeout(() => {
                const welcomeModal = new bootstrap.Modal(document.getElementById('kt_modal_welcome'));
                welcomeModal.show();
            }, 500);
        }


        // Initialize date picker
        $("#tanggal_lahir").flatpickr({
            altInput: true,
            altFormat: "d F Y",
            dateFormat: "Y-m-d",
            maxDate: new Date(),
            minDate: "1950-01-01",
            monthSelectorType: "dropdown",
            yearSelectorType: "dropdown",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
                },
                months: {
                    shorthand: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt",
                        "Nov", "Des"
                    ],
                    longhand: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                        "Agustus", "September", "Oktober", "November", "Desember"
                    ]
                }
            }
        });

        // Initialize Select2 for kelas
        $('[name="kelas"]').select2({
            dropdownParent: $("#kt_modal_profile_stepper")
        });

        // Initialize Stepper
        const stepperElement = document.querySelector("#kt_stepper_profile");
        const stepper = new KTStepper(stepperElement);

        // Handle next step
        stepper.on("kt.stepper.next", function (stepper) {
            let currentStepIndex = stepper.getCurrentStepIndex();
            let isValid = true;

            // Validate step 1
            if (currentStepIndex === 1) {
                const fname = document.querySelector('[name="fname"]').value;
                const kelas = document.querySelector('[name="kelas"]').value;

                if (!fname || !kelas) {
                    isValid = false;
                    // Show error notification
                    toastr.error('Silakan lengkapi semua field yang wajib diisi', 'Validasi Gagal');
                }
            }

            // Validate step 2
            if (currentStepIndex === 2) {
                const tanggalLahir = document.querySelector('[name="tanggal_lahir"]').value;
                const alamat = document.querySelector('[name="alamat"]').value;
                const noTelepon = document.querySelector('[name="no_telepon"]').value;

                if (!tanggalLahir || !alamat || !noTelepon) {
                    isValid = false;
                    // Show error notification
                    toastr.error('Silakan lengkapi semua field yang wajib diisi', 'Validasi Gagal');
                }
            }

            if (isValid) {
                stepper.goNext();
            }
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function (stepper) {
            stepper.goPrevious();
        });

        // Handle form submission
        stepper.on("kt.stepper.submit", function (stepper) {
            // Show loading indication
            stepper.getElement().querySelector('[data-kt-stepper-action="submit"]').setAttribute(
                'data-kt-indicator', 'on');

            // Disable all buttons during form submission
            stepper.getElement().querySelectorAll('[data-kt-stepper-action]').forEach(button => {
                button.disabled = true;
            });

            // Submit the form
            stepperElement.querySelector('form').submit();
        });

        // Handle start onboarding button click
        document.getElementById('startOnboarding').addEventListener('click', function () {
            // Hide welcome modal
            const welcomeModal = bootstrap.Modal.getInstance(document.getElementById(
                'kt_modal_welcome'));
            welcomeModal.hide();

            // Show stepper modal
            setTimeout(() => {
                const stepperModal = new bootstrap.Modal(document.getElementById(
                    'kt_modal_profile_stepper'));
                stepperModal.show();
            }, 300);
        });
    });

</script>
@endsection
