@if(isset($breadcrumbs))
    <div class="py-5 py-lg-5" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-gray-900 fw-bold my-1 fs-2">
                    {{ $breadcrumbs['main'] ?? 'Home' }}
                </h1>

                @if(!empty($breadcrumbs['sub']) || !empty($breadcrumbs['sub1']))
                    <ul class="breadcrumb breadcrumb-line fw-semibold text-gray-600 fs-7 my-1">
                        @if(!empty($breadcrumbs['sub']))
                            <li class="breadcrumb-item text-gray-600">
                                <a href="{{ $breadcrumbs['link'] ?? '#' }}" class="text-gray-600 text-hover-primary">
                                    {{ $breadcrumbs['sub'] }}
                                </a>
                            </li>
                        @endif
                        @if(!empty($breadcrumbs['sub1']))
                            <li class="breadcrumb-item text-gray-600">
                                {{ $breadcrumbs['sub1'] }}
                            </li>
                        @endif
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endif
