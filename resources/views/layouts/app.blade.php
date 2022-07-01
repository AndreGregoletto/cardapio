<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ mix('css/icheck-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <div class="content-wrapper">
                {{ $slot }}
            </div>
        </div>

        <!-- Scripts -->
        <script scr="{{ mix('js/app.js') }}" defer></script>
        

        <script src="plugins/jquery/jquery.min.js"></script>

        {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>


        <script src="plugins/chart.js/Chart.min.js"></script>

        <script src="plugins/sparklines/sparkline.js"></script>

        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>

        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>

        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

        <script src="plugins/summernote/summernote-bs4.min.js"></script>

        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        <script src="dist/js/demo.js"></script>

        <script src="dist/js/pages/dashboard.js"></script> --}}
    </body>
</html>
