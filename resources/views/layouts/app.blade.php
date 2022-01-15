<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
</head>

<body>
    @include('layouts.header')

        <main class="py-4">
            @yield('search')
            @yield('content')
        </main>
    </div>
    {{-- footer --}}
    @include('layouts.footer')
    <!-- jQuery -->
    <script src="/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    {{-- <script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- bs-custom-file-input -->
    {{-- <script src="/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="/template/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="/template/dist/js/demo.js"></script> --}}
    <!-- Page specific script -->
    {{-- <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script> --}}
    @if (Session::has('success'))
        @include('error.success')
    @endif
</body>

</html>
