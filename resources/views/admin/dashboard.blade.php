@extends('master.master')

@section('title', 'Admin Dashboard')


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
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-12">
                            <!--begin::Col-->
                            <!--end::Chart widget 11-->
                            <div class="col-xl-6">
                                <!--begin::Statistics Widget 5-->
                                <a href="{{route('buku.index')}}"
                                    class="card hoverable card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                    style="background-color: #CBF0F4">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <i class="ki-duotone ki-book text-dark fs-2x ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        <div class="text-dark text-hover-primary fw-bold fs-1 mb-2 mt-5">{{$totalBuku}}
                                        </div>
                                        <div class="fw-semibold text-dark text-hover-primary fs-3">Total Buku</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Statistics Widget 5-->
                                <a href="{{route('member.index')}}"
                                    class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <i class="ki-duotone ki-user-tick text-gray-100 fs-2x ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <div class="text-gray-100 fw-bold fs-1 mb-2 mt-5">{{$totalUser}}</div>
                                        <div class="fw-semibold text-gray-100 fs-3">Total User</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Statistics Widget 5-->
                                <a href="{{route('kategori.index')}}"
                                    class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <i class="ki-duotone ki-category text-white fs-2x ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        <div class="text-white fw-bold fs-1 mb-2 mt-5">{{$totalKategori}}</div>
                                        <div class="fw-semibold text-white fs-3">Total Kategori</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Statistics Widget 5-->
                                <a href="{{route('peminjaman.index')}}"
                                    class="card bg-primary hoverable card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <i class="ki-duotone ki-chart-pie-simple text-white fs-2x ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="text-white fw-bold fs-1 mb-2 mt-5">{{$totalPeminjaman}}</div>
                                        <div class="fw-semibold text-white fs-3">Total Peminjaman</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="row g-5 g-xl-12">

                            <!--begin::Chart widget 11-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">Data Grafik</span>
                                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Peminjaman Pengembalian dan
                                            Denda</span>
                                    </h3>
                                </div>

                                <div class="card-body pb-0 pt-4">
                                    <div id="chart"></div>
                                </div>
                                <!--end::Header-->

                                <!--end::Body-->
                            </div>
                            <!--begin::Col-->
                            <div class="col-xl-6 mb-xl-10">

                                <!--begin::List widget 16-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Buku dengan Kategori
                                                Terbanyak</span>

                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->

                                        <!--end::Toolbar-->
                                    </div>
                                    <div class="card-body pb-0 pt-4">
                                        <div id="chart2"></div>
                                    </div>
                                </div>


                                <!--end::List widget 16-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Chart widget 32-->
                            <div class="card card-flush h-lg-50 col-xl-6 mb-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <h3 class="card-title text-gray-800">Buku Paling Banyak Dipinjam</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!-- Placeholder untuk daftar buku -->
                                    <div id="most-read-bukus"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>


                        <!--end::List Widget-->
                        <div class="row g-5 g-xl-8">
                            <div class="col-xl-8">
                                <!--begin::Tables Widget 5-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Data Peminjaman</span>
                                            <span class="text-muted mt-1 fw-semibold fs-7">Lebih Dari
                                                +{{ $totalPeminjaman }} Peminjaman</span>
                                        </h3>
                                    </div>
                                    <div class="card-body py-3">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <thead>
                                                    <tr class="border-0">
                                                        <th class="p-0 w-50px text-muted mt-1"></th>
                                                        <th class="p-0 min-w-150px text-muted mt-1"></th>
                                                        <th class="p-0 min-w-140px text-muted mt-1"></th>
                                                        <th class="p-0 min-w-110px text-muted mt-1"></th>
                                                        <th class="p-0 min-w-50px text-muted mt-1"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($peminjamans as $peminjaman)
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                <img src="{{ asset('storage/' . $peminjaman->buku->foto) }}"
                                                                    class="h-50 align-self-center" alt="Foto Buku" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $peminjaman->user->name }}</a>
                                                            <span
                                                                class="text-muted fw-semibold d-block">{{ $peminjaman->buku->judul }}</span>
                                                        </td>
                                                        <td class="text-end text-muted fw-bold">Sampai
                                                            {{ $peminjaman->tanggal_kembali }}</td>
                                                        <td class="text-end">
                                                            <span
                                                                class="badge badge-light-{{ $peminjaman->status == 'pending' ? 'warning' : ($peminjaman->status == 'disetujui' ? 'success' : ($peminjaman->status == 'dikembalikan' ? 'primary' : 'danger')) }}">
                                                                {{ ucfirst($peminjaman->status) }}
                                                            </span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="{{ route('peminjaman.index') }}"
                                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                <i class="ki-duotone ki-arrow-right fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tables Widget 5-->
                            <div class="col-xl-4">
                                <!--begin::List Widget 2-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title fw-bold text-dark">User Terbaru</h3>
                                        <div class="card-toolbar">
                                            <a href="{{ route('member.index') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="ki-duotone ki-plus-square fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>Tambah User
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2" id="userList">
                                        @foreach ($users as $user)
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img
                                                    src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/media/avatars/blank.png') }}" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Text-->
                                            <div class="flex-grow-1">
                                                <a href="#"
                                                    class="text-dark fw-bold text-hover-primary fs-6">{{ $user->name }}</a>
                                                <span
                                                    class="text-muted d-block fw-bold">{{ ucfirst($user->role) }}</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>
                            <!--begin::Tables Widget 2-->
                            <div class="col-xl-6">
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Kategori Terbaru</span>
                                            <span class="text-muted mt-1 fw-semibold fs-7">Lebih Dari
                                                +{{$totalKategori}} Kategori Terbaru</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="{{ route('kategori.index') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="ki-duotone ki-plus-square fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>Tambah Kategori
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-5">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 min-w-200px"></th>
                                                        <th class="p-0 min-w-325px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @foreach($kategoris as $kategori)
                                                    <tr>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{$kategori->nama}}</a>
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="text-muted fw-bold">{{$kategori->buku_count}}
                                                                Buku</span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tables Widget 2-->
                            </div>
                            <!--begin::Tables Widget 2-->
                            <div class="col-xl-6">
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Buku Terbaru</span>
                                            <span class="text-muted mt-1 fw-semibold fs-7">Lebih Dari
                                                +{{$totalBuku}} Buku Terbaru</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="{{ route('buku.index') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="ki-duotone ki-plus-square fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>Tambah Buku
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-5">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 w-50px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-150px"></th>
                                                        <th class="p-0 min-w-125px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @foreach($bukus as $buku)
                                                    <tr>
                                                        <td>
                                                            <div class="symbol symbol-45px me-2">
                                                                <img src="{{ asset('storage/' . $buku->foto) }}"
                                                                    class="h-100 align-self-center" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $buku->judul}}</a>
                                                            <span class="text-muted fw-semibold d-block fs-7">
                                                                {{$buku->penulis}}</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span
                                                                class="badge badge-light-primary fw-semibold me-1">{{$buku->genre}}</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="text-muted fw-bold"> {{$buku->stok}}
                                                                Stok</span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tables Widget 2-->

                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    @endsection



                    @section('script')
                    <script>
                        $(document).ready(function () {
                            // Ambil data dari route dashboard.data menggunakan AJAX
                            $.ajax({
                                url: "{{ route('dashboard.data') }}",
                                method: "GET",
                                success: function (response) {
                                    // Inisialisasi ApexCharts dengan data yang diterima
                                    var options = {
                                        series: [{
                                                name: 'Pending',
                                                data: response.totalPending
                                            },
                                            {
                                                name: 'Disetujui',
                                                data: response.totalDisetujui
                                            },
                                            {
                                                name: 'Dikembalikan',
                                                data: response.totalDikembalikan
                                            },
                                            {
                                                name: 'Denda',
                                                data: response.totalDenda
                                            }
                                        ],
                                        chart: {
                                            type: 'bar',
                                            height: 350,
                                            stacked: false,
                                            toolbar: {
                                                show: true,
                                                tools: {
                                                    download: true,
                                                    selection: true,
                                                    zoom: true,
                                                    zoomin: true,
                                                    zoomout: true,
                                                    pan: true,
                                                    reset: true
                                                }
                                            },
                                            animations: {
                                                enabled: true,
                                                speed: 800,
                                                animateGradually: {
                                                    enabled: true,
                                                    delay: 150
                                                },
                                                dynamicAnimation: {
                                                    enabled: true,
                                                    speed: 350
                                                }
                                            }
                                        },
                                        colors: ['#FEB019', '#00E396', '#008FFB', '#FF4560'],
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                borderRadius: 5,
                                                borderRadiusApplication: 'end',
                                                dataLabels: {
                                                    total: {
                                                        enabled: false
                                                    }
                                                }
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },
                                        xaxis: {
                                            categories: response.months,
                                            labels: {
                                                rotate: -45,
                                                style: {
                                                    fontSize: '12px'
                                                }
                                            }
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Jumlah Tiap Status Peminjaman'
                                            },
                                            labels: {
                                                formatter: function (val) {
                                                    return val.toFixed(0);
                                                }
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        legend: {
                                            position: 'top',
                                            horizontalAlign: 'center'
                                        },
                                        states: {
                                            normal: {
                                                filter: {
                                                    type: 'none',
                                                    value: 0
                                                }
                                            },
                                            hover: {
                                                filter: {
                                                    type: 'none',
                                                    value: 0
                                                }
                                            },
                                            active: {
                                                allowMultipleDataPointsSelection: false,
                                                filter: {
                                                    type: 'none',
                                                    value: 0
                                                }
                                            }
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function (val) {
                                                    return val + " item"
                                                }
                                            }
                                        }
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chart"),
                                        options);
                                    chart.render();
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error fetching data:", error);
                                    // Tampilkan pesan error ke pengguna
                                    $("#chart").html(
                                        '<div class="alert alert-danger">Gagal memuat data grafik: ' +
                                        error + '</div>');
                                }
                            });
                        });

                    </script>


                    <script>
                        $(document).ready(function () {
                            // Ambil data dari route /dashboard/category-data menggunakan AJAX
                            $.ajax({
                                url: "{{ route('dashboard.category.data') }}",
                                method: "GET",
                                success: function (response) {
                                    // Inisialisasi ApexCharts dengan data yang diterima
                                    var options = {
                                        series: response.totals, // Data jumlah buku
                                        chart: {
                                            width: 380,
                                            type: 'donut',
                                        },
                                        labels: response.categories, // Label kategori
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 200
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chart2"),
                                        options);
                                    chart.render();
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error fetching data:", error);
                                }

                            });
                        });

                        $(document).ready(function () {
                            // Ambil data dari route /dashboard/most-read-bukus menggunakan AJAX
                            $.ajax({
                                url: "{{ route('dashboard.most-read-books') }}",
                                method: "GET",
                                success: function (response) {
                                    // Tampilkan data dalam card
                                    let html = '';
                                    response.forEach(function (buku) {
                                        html += `
                        <div class="d-flex flex-stack mb-5">
                            <!-- Gambar Buku -->
                            <div class="symbol symbol-50px me-5">
                            <img src="${buku.foto}"class="h-100 align-self-center" alt="" />                            </div>

                            <!-- Detail Buku -->
                            <div class="d-flex flex-column flex-grow-1">
                                <span class="text-gray-800 fw-bold fs-6">${buku.judul}</span>
                                <span class="text-gray-600 fw-semibold fs-7">${buku.penulis}</span>
                            </div>

                            <!-- Statistik Peminjaman -->
                            <div class="d-flex align-items-center">
                                <span class="badge badge-light-primary fs-7 fw-bold">${buku.total_pinjam}x Dipinjam</span>
                            </div>
                        </div>
                    `;
                                    });

                                    // Masukkan HTML ke dalam placeholder
                                    $('#most-read-bukus').html(html);
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error fetching data:", error);
                                }
                            });
                        });
                    </script>
                    @endsection
