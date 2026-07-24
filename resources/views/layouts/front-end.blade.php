<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('SEO')

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css?v=<?= time() ?>">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css?v=<?= time() ?>">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css?v=<?= time() ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.23/dist/lenis.css">

    <!-- style -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= time() ?>">

    <!-- responsive -->
    <link rel="stylesheet" href="/assets/css/responsive.css?v=<?= time() ?>">

    <!-- color -->
    <link rel="stylesheet" href="/assets/css/color.css?v=<?= time() ?>">

    <!-- jQuery -->
    <script src="/assets/js/jquery-3.6.0.min.js?v=<?= time() ?>"></script>

    <!-- Preloader -->
    <script src="/assets/js/preloader.js?v=<?= time() ?>"></script>

    <script src="https://unpkg.com/lenis@1.3.23/dist/lenis.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
</head>

<body>

    @include('layouts.partials.frontend.header')

    <main class="page-wrapper">
        {{ $slot }}
    </main>

    @include('layouts.partials.frontend.footer')


    <!-- template js -->
    <script src="/assets/js/custom.js?v=<?= time() ?>"></script>
    <!-- bootstrap -->
    <script src="/assets/js/bootstrap.min.js?v=<?= time() ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeFancybox();
            initializeLenis();
            initializeTestimonialSplide();
        });

        function initializeFancybox() {
            if (typeof Fancybox === 'undefined') {
                return;
            }

            const fancyboxElements = document.querySelectorAll('[data-fancybox]');

            if (!fancyboxElements.length) {
                return;
            }

            Fancybox.bind('[data-fancybox]', {});
        }

        function initializeLenis() {

            const lenis = new Lenis({
                duration: 1,
                smoothWheel: true,
                wheelMultiplier: 0.8,
                touchMultiplier: 0.8,
                lerp: 0.5
            });

            function lenisAnimationFrame(time) {
                lenis.raf(time);
                requestAnimationFrame(lenisAnimationFrame);
            }

            requestAnimationFrame(lenisAnimationFrame);
        }

        function initializeTestimonialSplide() {
            const testimonialSplide = document.getElementById('testimonialSplide');

            if (!testimonialSplide) {
                return;
            }

            if (typeof Splide === 'undefined') {
                return;
            }

            new Splide(testimonialSplide, {
                type: 'loop',
                perPage: 1,
                perMove: 1,
                gap: '20px',
                arrows: true,
                pagination: true,
                autoplay: false,
                interval: 5000,
                pauseOnHover: false,
                pauseOnFocus: false,
                speed: 800
            }).mount();
        }
    </script>

</body>

</html>
