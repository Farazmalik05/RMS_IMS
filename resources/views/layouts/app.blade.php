<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon icon-->
        <link rel="shortcut icon" href="{{ asset('images/favicon/icons8-invoice-pastel-32.png') }}">


        <!-- Libs CSS -->
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet"> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" rel="stylesheet"> -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.css" rel="stylesheet">



        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

        @yield('styles')
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <main id="main-wrapper" class="main-wrapper">
            @include('layouts.partials.top_navbar')
            
            @include('layouts.partials.side_navbar')

            <!-- Page Content -->
            <div id="app-content">
                <!-- Container fluid -->
                <div class="app-content-area">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- Page Content End -->

        </main>
        
        <!-- Scripts -->
        <!-- Libs JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.js"></script>

        <!-- Theme JS -->
        <script src="{{ asset('js/theme.min.js') }}"></script>
        @yield('scripts')
    </body>
</html>