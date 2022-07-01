<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ mix('css/icheck-bootstrap.css') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-light container hold-transition login-page">
        <div class="font-sans text-gray-900 antialiased row mt-5 mb-5">
            {{-- <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <div class="col-md-3"></div> --}}
            {{ $slot }}
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
