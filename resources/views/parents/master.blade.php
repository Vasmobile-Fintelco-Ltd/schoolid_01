<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Quiz App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" type="text/css">

        <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css" id="light-style">
        <link rel="stylesheet" href="{{ asset('assets/css/app-dark.min.css') }}" type="text/css" id="dark-style">
         {{-- //new ui  --}}
 <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
 rel="stylesheet">

<!-- Preloader -->
<link type="text/css"
 href="{{ asset('back/public/vendor/spinkit.css') }}"
 rel="stylesheet">

<!-- Perfect Scrollbar -->
<link type="text/css"
 href="{{ asset('back/public/vendor/perfect-scrollbar.css') }}"
 rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css"
 href="{{ asset('back/public/css/material-icons.css') }}"
 rel="stylesheet">

<!-- Font Awesome Icons -->
<link type="text/css"
 href="{{ asset('back/public/css/fontawesome.css') }}"
 rel="stylesheet">

<!-- Preloader -->
<link type="text/css"
 href="{{ asset('back/public/css/preloader.css') }}"
 rel="stylesheet">

<!-- App CSS -->
<link type="text/css"
 href="{{ asset('back/public/css/app.css') }}"
 rel="stylesheet">
 <link type="text/css"
 href="{{ asset('back/public/css/parent.css') }}"
 rel="stylesheet">

        @yield('styles')

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('parents.inc.left-nav')
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('parents.inc.navbar')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    @yield('content')
                    <!-- container -->
                </div>
                <!-- content -->
                <!-- Footer Start -->
                @include('teachers.inc.footer')
                <!-- end Footer -->
            </div>


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->


        <div class="rightbar-overlay"></div>



        <!-- bundle -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>


        <!-- Apex js -->

        <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>

        <!-- Todo js -->
        <script src="{{ asset('assets/js/ui/component.todo.js') }}"></script>

        <!-- demo app -->
        <script src="{{ asset('assets/js/pages/demo.dashboard-crm.js') }}"></script>
        <!-- end demo js-->


        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>

        @yield('scripts')

    </body>
</html>
