<!DOCTYPE html>

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>SU Connect | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/plugins/bootstrap/bootstrap.min.css">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend-module') }}/css/style.css">

    @stack('css')
</head>

<body>

    @include('frontendmodule::layouts.partials._header')
    
    @yield('content')

    @include('frontendmodule::layouts.partials._footer')


    <!-- # JS Plugins -->
    <script src="{{ asset('assets/frontend-module') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/frontend-module') }}/plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('assets/frontend-module') }}/js/script.js"></script>

    @stack('js')

</body>

</html>
