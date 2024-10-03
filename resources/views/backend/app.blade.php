<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description"
        content="custom admin dashboard. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords"
        content="admin, dashboard, custom dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content=" - Admin Dashboard" />

    <title>
        @yield('title')
    </title>

    {{-- Style --}}
    @include('backend.partials.styles')
    @stack('css')

</head>


<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">

    <!-- ================ START WRAPPER ============== -->
    <div class="wrapper">
        <!-- ========== TOP BAR START ========== -->
        @include('backend.partials.header')
        <!-- ========== TOP BAR END ========== -->

        <!-- ========== LEFT SIDEBAR START ========== -->
        @include('backend.partials.sidebar')
        <!-- ========== LEFT SIDEBAR END ========== -->

        <!-- ============================================================== -->
        <!-- MAIN PAGE CONTENT HERE START -->
        <!-- ============================================================== -->

        <div class="content-page">

            {{-- Content Start --}}
            @yield('content')
            <!-- Content End -->

            <!-- Footer Start -->
            @include('backend.partials.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- MAIN PAGE CONTENT HERE END -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!--=============== THEME SETTING RIGHT SIDEBAR START =================-->
    @include('backend.partials.theme-sidebar')
    <!--=============== THEME SETTING RIGHT SIDEBAR END =================-->



    <!-- JAVASCRIPT -->
    @include('backend.partials.scripts')

    @stack('script')


        //  Toast notifications
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('success', "{{ session('success') }}");
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('error', "{{ session('error') }}");
                });
            </script>
        @endif

        @if (session('warning'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('warning', "{{ session('warning') }}");
                });
            </script>
        @endif

        @if (session('info'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('info', "{{ session('info') }}");
                });
            </script>
        @endif

    {{-- <script>
        $(document).ready(function() {

            toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };

                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toastr-bottom-right",
                };
                toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script> --}}



</body>

</html>
