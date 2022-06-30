<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ mix('css/icheck-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-light container hold-transition login-page">
        <div class="font-sans text-gray-900 antialiased row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">{{ $slot }}</div>
            <div class="col-md-3"></div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
