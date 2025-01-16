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
                    <span class="menu-arrow d-lg-none"></span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                <!--begin:Menu link-->
                <a href="" class="menu-link py-3">
                    <span class="menu-title">Pinjam Buku</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            @if (Auth::check() && Auth::user()->role === 'admin')  
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"  
                 data-kt-menu-placement="bottom-start"  
                 class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">      
                <a href="{{ route('admin.dashboard') }}" class="menu-link py-3">      
                    <span class="menu-title">Dashboard</span>      
                    <span class="menu-arrow d-lg-none"></span>      
                </a>      
                <!--begin::Menu sub-->  
                <div class="menu-sub menu-sub-dropdown w-175px py-4">  
                    <!--begin::Menu item-->  
                    <div class="menu-item px-3">  
                        <a href="{{ route('admin.dashboard') }}" class="menu-link px-3">Admin Dashboard</a>  
                    </div>  
                    <!--end::Menu item-->  
                    <!--begin::Menu item-->  
                    <div class="menu-item px-3">  
                        <a href="{{ route('users.index') }}" class="menu-link px-3">Kelola User</a>  
                    </div>  
                    <!--end::Menu item--> 
                    <!--begin::Menu item-->  
                    <div class="menu-item px-3">  
                        <a href="{{ route('buku.index') }}" class="menu-link px-3">Kelola Buku</a>  
                    </div>  
                    <!--end::Menu item-->  
                    <!--begin::Menu item-->  
                    <div class="menu-item px-3">  
                        <a href="{{ route('kategori.index') }}" class="menu-link px-3">Kelola Kategori</a>  
                    </div>  
                    <!--end::Menu item-->  
                </div>  
                <!--end::Menu sub-->  
            </div>  
        @endif  

        
        

        

        

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
</div>
<!--end::Container-->
