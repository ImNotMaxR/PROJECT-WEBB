@extends('master.master')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Container-->
            <div class="container-xxl d-flex flex-grow-1 flex-stack">
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::FAQ card-->
                        <div class="card">
                            <!--begin::Body-->
                            <div class="card-body p-lg-15">
                                <!--begin::Classic content-->
                                <div class="mb-13">
                                    <!--begin::Intro-->
                                    <div class="mb-15">
                                        <!--begin::Title-->
                                        <h4 class="fs-2x text-gray-800 w-bolder mb-6">Pertanyaan yang Sering Diajukan
                                            (FAQ)</h4>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <p class="fw-semibold fs-4 text-gray-600 mb-2">
                                            Berikut adalah beberapa pertanyaan yang sering diajukan oleh pengguna
                                            mengenai layanan perpustakaan online CiroBooks.
                                        </p>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Intro-->
                                    <!--begin::Row-->
                                    <div class="row mb-12">
                                        <!--begin::Col-->
                                        <div class="col-md-6 pe-md-10 mb-10 mb-md-0">
                                            <!--begin::Title-->
                                            <h2 class="text-gray-800 fw-bold mb-4">Peminjaman Buku</h2>
                                            <!--end::Title-->
                                            <!--begin::Accordion-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara
                                                        meminjam buku?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_4_1" class="collapse show fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Login ke akun siswa<br>
                                                        2. Cari buku yang ingin dipinjam<br>
                                                        3. Klik "Pinjam Buku"<br>
                                                        4. Tunggu konfirmasi dari admin (maks 1x24 jam)<br>
                                                        5. Ambil buku di perpustakaan setelah status "Disetujui"
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_4_2">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana
                                                        melihat tanggal pengembalian?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_4_2" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        Setelah peminjaman disetujui, Anda dapat melihat:<br>
                                                        1. Tanggal pengembalian di dashboard akun<br>
                                                        2. Notifikasi email/Whatsapp 3 hari sebelum jatuh tempo<br>
                                                        3. Masa pinjam standar 7 hari (dapat diperpanjang)
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_4_3">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Berapa
                                                        maksimal buku yang bisa dipinjam?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_4_3" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        Siswa dapat meminjam maksimal:<br>
                                                        - 2 buku fiksi<br>
                                                        - 3 buku non-fiksi<br>
                                                        Total maksimal 5 buku dalam waktu bersamaan
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_4_4">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara
                                                        memperpanjang pinjaman?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_4_4" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Buka menu "Peminjaman Aktif"<br>
                                                        2. Pilih buku yang ingin diperpanjang<br>
                                                        3. Klik "Perpanjang Peminjaman"<br>
                                                        4. Admin akan memverifikasi (1x24 jam)<br>
                                                        5. Maksimal 1x perpanjangan (3 hari tambahan)
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Section-->
                                            <!--end::Accordion-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 ps-md-10">
                                            <!--begin::Title-->
                                            <h2 class="text-gray-800 fw-bold mb-4">Denda dan Pengembalian Buku</h2>
                                            <!--end::Title-->
                                            <!--begin::Accordion-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_5_1">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara
                                                        mengetahui tanggal pengembalian dan perhitungan denda?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_5_1" class="collapse show fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Tanggal pengembalian akan terlihat otomatis di profil
                                                        pengguna setelah peminjaman disetujui<br>
                                                        2. Sistem akan menghitung denda otomatis jika pengembalian
                                                        terlambat (Rp2.000/hari/buku)<br>
                                                        3. Notifikasi akan dikirim via email/Whatsapp 3 hari sebelum jatuh
                                                        tempo
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_5_2">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara
                                                        memperpanjang masa peminjaman?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_5_2" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Akses menu "Perpanjangan Peminjaman" di profil Anda<br>
                                                        2. Pilih buku yang ingin diperpanjang<br>
                                                        3. Ajukan permohonan maksimal 2 hari sebelum jatuh tempo<br>
                                                        4. Tunggu konfirmasi admin via notifikasi sistem
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_5_3">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Apa
                                                        konsekuensi jika terlambat mengembalikan?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_5_3" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Denda progresif: Rp2.000/hari untuk 7 hari pertama,
                                                        Rp5.000/hari setelahnya<br>
                                                        2. Pemblokiran sementara akses peminjaman jika denda >
                                                        Rp20.000<br>
                                                        3. Laporan ke bagian kesiswaan jika keterlambatan >14 hari
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <div class="m-0">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0"
                                                    data-bs-toggle="collapse" data-bs-target="#kt_job_5_4">
                                                    <!--begin::Icon-->
                                                    <div
                                                        class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <i class="ki-duotone ki-plus-square toggle-off fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara
                                                        membayar denda?</h4>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_5_4" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
                                                        1. Pembayaran bisa dilakukan via:<br>
                                                        - Transfer ke rekening perpustakaan<br>
                                                        - Langsung ke petugas saat pengembalian buku<br>
                                                        2. Upload bukti pembayaran di menu "Pembayaran Denda"<br>
                                                        3. Status denda akan update otomatis setelah verifikasi admin
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Section-->
                                            <!--end::Accordion-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Classic content-->
                                <!--begin::Card-->
                                <div class="card mb-4 bg-light text-center">
                                    <!--begin::Body-->
                                    <div class="card-body py-12">
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/facebook-4.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/instagram-2-1.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/github.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/behance.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/pinterest-p.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/twitter.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                        <!--begin::Icon-->
                                        <a href="#" class="mx-4">
                                            <img src="{{ asset('assets/media/svg/brand-logos/dribbble-icon-1.svg')}}"
                                                class="h-30px my-2" alt="" />
                                        </a>
                                        <!--end::Icon-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::FAQ card-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
</div>
</div>
@endsection
