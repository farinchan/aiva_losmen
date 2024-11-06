<!DOCTYPE html>
<!--
Support: Fajri Rinaldi Chan
Website: https://gariskode.com
Contact: fajri@ariskode.com
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>AIVA LOSMEN</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="
            Manajemen Losmen AIVA adalah aplikasi berbasis web yang digunakan untuk mengelola data losmen, kamar, tamu, reservasi, dan laporan.
        " />
    <meta name="keywords"
        content="
            aiva losmen, manajemen losmen, aplikasi losmen, manajemen kamar, manajemen tamu, manajemen reservasi, manajemen laporan, aplikasi web, aplikasi berbasis web, aplikasi manajemen losmen, aplikasi manajemen,
        " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:site_name" content="AIVA LOSMEN" />
    <link rel="shortcut icon" href="{{ asset('front/images/aiva_losmen_logo.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('back/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('back/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('back/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    @include('back/partials/theme-mode/_init')
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            @include('back/layout/partials/_header')
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                @include('back/layout/partials/_sidebar')
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        @if (request()->routeIs('back.dashboard'))
                            @include('back/layout/partials/_toolbar')
                        @else
                            @include('back/layout/partials/_toolbar2')
                        @endif

                        @yield('content')
                    </div>
                    <!--end::Content wrapper-->
                    @include('back/layout/partials/_footer')
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    {{-- @include('back/partials/_drawers') --}}
    @include('back/partials/_scrolltop')
    <!--begin::Modals-->
    {{-- @include('back/partials/modals/_upgrade-plan')
    @include('back/partials/modals/create-app/_main')
    @include('back/partials/modals/_new-target')
    @include('back/partials/modals/_view-users')
    @include('back/partials/modals/users-search/_main')
    @include('back/partials/modals/_invite-friends') --}}
    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('back/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('back/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    {{-- <script src="{{ asset('back/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> --}}
    <script src="{{ asset('back/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('back/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('back/js/custom/widgets.js') }}"></script>
    {{-- <script src="{{ asset('back/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/users-search.js') }}"></script> --}}
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @yield('scripts')
    @include('sweetalert::alert')
</body>
<!--end::Body-->

</html>
