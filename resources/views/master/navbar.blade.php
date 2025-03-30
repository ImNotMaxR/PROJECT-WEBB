        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                        <!--begin::Container-->
                        <div class="container-xxl d-flex flex-grow-1 flex-stack">
                            <!--begin::Header Logo-->
                            <div class="d-flex align-items-center me-5">
                                <!--begin::Heaeder menu toggle-->
                                <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3"
                                    id="kt_header_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Heaeder menu toggle-->
                                <a href="{{ route('home') }}">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/demo11.svg') }}"
                                        class="theme-light-show h-20px h-lg-30px" />
                                    <img alt="Logo" src="{{ asset('assets/media/logos/demo11-dark.svg') }}"
                                        class="theme-dark-show h-20px h-lg-30px" />
                                </a>
                            </div>
                            <!--end::Header Logo-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-center flex-shrink-0">
                                <!--begin::Activities-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                </div>
                                <!--end::Activities-->
                                <!--begin::Theme mode-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4">
                                    <!--begin::Menu toggle-->
                                    <a href="#"
                                        class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                                        data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                            <span class="path7"></span>
                                            <span class="path8"></span>
                                            <span class="path9"></span>
                                            <span class="path10"></span>
                                        </i>
                                        <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <!--begin::Menu toggle-->
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-night-day fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                        <span class="path6"></span>
                                                        <span class="path7"></span>
                                                        <span class="path8"></span>
                                                        <span class="path9"></span>
                                                        <span class="path10"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">Terang</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-duotone ki-moon fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">Gelap</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Theme mode-->
                                <!--begin::User-->
                                <div class="d-flex align-items-center ms-3 ms-lg-4" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu- wrapper-->
                                    <!--begin::User icon(remove this button to use user avatar as menu toggle)-->
                                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-user fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <!--end::User icon-->
                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        @auth
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo"
                                                        src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/media/avatars/blank.png') }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        {{ Auth::user()->name }}
                                                    </div>
                                                    <span
                                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</span>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('profile.index') }}" class="menu-link px-5">Profilku</a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('pinjam.peminjaman') }}" class="menu-link px-5">
                                                <span class="menu-text">Pinjaman</span>
                                                <span class="menu-badge">
                                                    <span
                                                        class="badge badge-light-danger badge-circle fw-bold fs-7">{{ $totalPeminjaman }}</span>
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                                @csrf
                                                <a href="{{ route('logout') }}" class="menu-link px-5">
                                                    Keluar
                                                </a>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--end::Menu item-->
                                        @else
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('login') }}" class="menu-link px-5">Masuk</a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('register') }}" class="menu-link px-5">Buat Akun</a>
                                        </div>
                                        <!--end::Menu item-->
                                        @endauth
                                    </div>
                                    <!--end::User account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User -->
                                <div class="d-flex align-items-center ms-3 ms-lg-4 ">
                                </div>
                                <!--end::User -->


                                <!--begin::Other Menu-->
                                <!--begin::Menu wrapper-->
                                <div class="app-navbar-item">
                                    <!--begin::Menu toggle button-->
                                    <button
                                        class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-active-bg-light w-30px h-30px w-lg-40px h-lg-40px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-menu fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                    <!--end::Menu toggle button-->

                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('menu.faq') }}" class="menu-link px-5">
                                                <span class="menu-title">FAQ</span>
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-document fs-7"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('menu.contactus') }}" class="menu-link px-5">
                                                <span class="menu-title">Contact Us</span>
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-contact fs-7"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="{{ route('menu.help-center') }}" class="menu-link px-5">
                                                <span class="menu-title">Help Center</span>
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-information-5 fs-7"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->

                                <!--end::User -->
                                <!--begin::Menu wrapper-->
                                <!--begin::Sidebar Toggler-->
                                <!--end::Sidebar Toggler-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                        <!--begin::Separator-->
                        <!--end::Separator-->
                        <!--begin::Container-->
                        <div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100"
                            id="kt_header_nav">
                            <!--begin::Menu wrapper-->
                            <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true"
                                data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle"
                                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                <!--begin::Menu-->
                                <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-state-primary menu-title-gray-800 menu-arrow-gray-400 align-items-stretch flex-grow-1 my-5 my-lg-0 px-2 px-lg-0 fw-semibold fs-6"
                                    id="kt_header_menu" data-kt-menu="true">
                                    <!--begin:Menu item-->
                                    <div
                                        class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                        <!--begin:Menu link-->
                                        <a href="{{ route('home') }}" class="menu-link py-3">
                                            <span class="menu-title">Beranda</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->

                                    <!--begin:Menu item-->
                                    @if (Auth::check() && Auth::user()->role === 'user')
                                    <div
                                        class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                        <!--begin:Menu link-->
                                        <a href="{{route('pinjam.peminjaman')}}" class="menu-link py-3">
                                            <span class="menu-title">Pinjam Buku</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    @endif


                                    <!--end:Menu item-->
                                    @if (Auth::check() && Auth::user()->role === 'admin')
                                    <!--begin:Menu item-->
                                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                        data-kt-menu-placement="bottom-start"
                                        class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                        <!--begin:Menu link-->
                                        <span class="menu-link py-3 ">
                                            <span class="menu-title">Dashboard</span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div
                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('admin.dashboard') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-abstract-26 fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Admin Dashboard</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->

                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('member.index') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-profile-user fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Kelola User</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->

                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('request.pinjam') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-tablet-book fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Kelola Peminjaman</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->


                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('perpanjangan.index') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-tablet-book fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Kelola Perpanjangan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->

                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('buku.index') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-book fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Kelola Buku</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->

                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link py-3" href="{{ route('kategori.index') }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-duotone ki-category fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">Kelola Kategori</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                        </div>
                                        <!--end:Menu sub-->
                                    </div>
                                    <!--end:Menu item-->
                                    @endif
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    </div>
                    <!--end::Container-->
                    <div class="separator separator-dashed border-3 border-primary"></div>


                    <style>
                        .menu-link.active {
                            background-color: #f0f0f0;
                            color: #007bff !important;
                            font-weight: bold;
                            border-radius: 5px;
                        }

                        .menu-item .menu-link.active {
                            background-color: #e0e0e0;
                        }

                    </style>

                    @section('script')
                   

                    @endsection
