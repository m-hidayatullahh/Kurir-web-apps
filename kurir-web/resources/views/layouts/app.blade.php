<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="index-page">

    {{-- Header --}}
    @include('partials.header')

    <main class="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- JS --}}
    @include('partials.script')

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>
