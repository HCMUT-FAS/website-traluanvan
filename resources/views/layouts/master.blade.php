<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/css/fontawesome-free/css/all.min.css') }}">
    @stack('css')
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/jquery/adminlte.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('js')

    @if (Session::has('success'))
        @include('error.success')
    @endif

</body>

</html>
