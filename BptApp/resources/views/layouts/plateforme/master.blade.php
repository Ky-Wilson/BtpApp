<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <link href="{{ asset('assets/plateforme/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plateforme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/plateforme/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/plateforme/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('layouts.plateforme.inc.site-navbar')
        {{-- @include('layouts.plateforme.inc.site-modal') --}}
        @yield('content')
        @include('layouts.plateforme.inc.site-footer')
        
        <script src="https://ajax.googleapis.com/ajax/lib/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/plateforme/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/plateforme/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/plateforme/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('assets/plateforme/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('assets/plateforme/js/main.js') }}"></script>
    </body>
</html>
