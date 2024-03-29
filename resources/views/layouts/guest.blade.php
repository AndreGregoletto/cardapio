<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ mix('css/icheck-bootstrap.css') }}">

        @stack('css')

        <title>{{ config('app.name', 'Laravel') }}</title>

    </head>
    <body class="{{$class}}">
        {{ $slot }}

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')
        {{-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    </body>
</html>
