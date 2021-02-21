{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

{{--        <!-- Styles -->--}}
{{--        <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}

{{--        @livewireStyles--}}

{{--        <!-- Scripts -->--}}
{{--        <script src="{{ mix('js/app.js') }}" defer></script>--}}
{{--    </head>--}}
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100">--}}
{{--            @livewire('navigation-dropdown')--}}

{{--            <!-- Page Heading -->--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}

{{--        @stack('modals')--}}

{{--        @livewireScripts--}}
{{--    </body>--}}
{{--</html>--}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Busmate Sri Lanka') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

{{--    <link rel="stylesheet" href="{{asset('theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">--}}
{{--    <!-- Toastr -->--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/toastr/toastr.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/jqvmap/jqvmap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/daterangepicker/daterangepicker.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('theme/plugins/summernote/summernote-bs4.css')}}">--}}
@yield('theme_css')
<!-- jQuery -->
    <script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('theme/dist/js/adminlte.js')}}"></script>
{{--    <script src="{{asset('theme/plugins/sweetalert2/sweetalert2.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/toastr/toastr.min.js')}}"></script>--}}


    {{--    <script src="{{asset('theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>--}}

{{--    <script src="{{asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
{{--    <script>--}}
{{--        $.widget.bridge('uibutton', $.ui.button)--}}
{{--    </script>--}}
{{--    <script src="{{asset('theme/plugins/chart.js/Chart.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/sparklines/sparkline.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/jqvmap/jquery.vmap.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/jquery-knob/jquery.knob.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/moment/moment.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/summernote/summernote-bs4.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>--}}
{{--    <script src="{{asset('theme/dist/js/pages/dashboard.js')}}"></script>--}}
{{--    <script src="{{asset('theme/dist/js/demo.js')}}"></script>--}}
    @yield('theme_js')

{{--            <script src="{{ mix('js/app.js') }}" defer></script>--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @yield('top_nav_bar')
    @yield('side-bar')
    @yield('content')
    @yield('footer')
    @yield('custom_js')
</div>
</body>
</html>
<script type="text/javascript">

</script>

