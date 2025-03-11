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
<!--begin::Container-->
<div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100" id="kt_header_nav">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true" data-kt-drawer-name="header-menu"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-state-primary menu-title-gray-800 menu-arrow-gray-400 align-items-stretch flex-grow-1 my-5 my-lg-0 px-2 px-lg-0 fw-semibold fs-6"
            id="kt_header_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                <!--begin:Menu link-->
                <a href="{{ route('home') }}" class="menu-link py-3">
                    <span class="menu-title">Beranda</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @if (Auth::check() && Auth::user()->role === 'user')
            <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
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
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                <!--begin:Menu link-->
                <span class="menu-link py-3 ">
                    <span class="menu-title">Dashboard</span>
                    <span class="menu-arrow d-lg-none"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
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
<div class="separator border-5 border-primary"></div>


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

@section('')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPath = window.location.pathname; 
        let menuLinks = document.querySelectorAll(".menu-link"); 

        menuLinks.forEach(link => {
            let linkPath = new URL(link.href, window.location.origin).pathname;

            if (currentPath === linkPath) {
                link.classList.add("active");
            }
        });

        let dashboardMenu = document.querySelector(".menu-link.py-3 span.menu-title:contains('Dashboard')");
        let dashboardSubmenuLinks = [
            "{{ route('admin.dashboard') }}",
            "{{ route('member.index') }}",
            "{{ route('request.pinjam') }}",
            "{{ route('buku.index') }}",
            "{{ route('kategori.index') }}"
        ].map(url => new URL(url, window.location.origin).pathname);

        // If any submenu is active, make "Dashboard" active
        if (dashboardSubmenuLinks.includes(currentPath)) {
            dashboardMenu.closest('.menu-link').classList.add("active");
        }
    });

</script>


@endsection
