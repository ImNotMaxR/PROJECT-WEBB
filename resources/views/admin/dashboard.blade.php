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
                                                                        class="h-50 align-self-center"
                                                                        alt="Foto Buku" />
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
                                                                <span class="text-muted fw-bold">{{$kategori->buku_count}} Buku</span>
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
                                                                <span
                                                                    class="text-muted fw-semibold d-block fs-7"> {{$buku->penulis}}</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <span
                                                                    class="badge badge-light-primary fw-semibold me-1">{{$buku->genre}}</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <span class="text-muted fw-bold"> {{$buku->stok}} Stok</span>
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
                        @endsection
