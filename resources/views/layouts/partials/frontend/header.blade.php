{{-- loader --}}
{{--
<div class="preloader">
    <div class="loader4"></div>
</div>
--}}

<header class="topnav two shadow">
    <div class="container">

        <div class="header-bar stricked-menu">

            <a href="{{ route('welcome') }}">
                <img src="{{ asset('assets/img/logo-b.png') }}" alt="Valente Optic">
            </a>

            <nav class="navbar">
                <ul class="navbar-links">

                    <li class="navbar-dropdown">
                        <a href="{{ route('welcome') }}">
                            Начало
                        </a>
                    </li>

                    <li class="navbar-dropdown">
                        <a href="{{ route('about') }}">
                            За нас
                        </a>
                    </li>

                    <li class="navbar-dropdown">
                        <a href="{{ route('pricing') }}">
                            Абонаменти
                        </a>
                    </li>

                    <li class="navbar-dropdown">
                        <a href="{{ route('contact') }}">
                            Контакти
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="pickup d-flex gap-2 d-none d-lg-block">

                @auth
                    <a href="{{ route('dashboard') }}" class="btn">
                        Админ панел
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn">
                        Вход
                    </a>

                    <a href="{{ route('register') }}" class="btn">
                        Регистрация
                    </a>
                @endauth

            </div>

            <div class="bar-menu">
                <i class="fa-solid fa-bars"></i>
            </div>

        </div>

        <div class="mobile-nav hmburger-menu" id="mobile-nav"
            style="display:block;background-image:url('{{ asset('assets/img/background.png') }}');">

            <div class="res-log">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/img/logo-b.png') }}" alt="Valente Optic">
                </a>
            </div>

            <ul>

                <li>
                    <a href="{{ route('welcome') }}">
                        Начало
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}">
                        За нас
                    </a>
                </li>

                <li>
                    <a href="{{ route('pricing') }}">
                        Абонаменти
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">
                        Контакти
                    </a>
                </li>

            </ul>

            <div class="menu-sidebar-single-widget">

                <h5 class="menu-sidebar-title">
                    Контакти
                </h5>

                <div class="header-contact-info">

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                        Бургас, България
                    </span>

                    <span>
                        <a href="mailto:info@valenteoptic.bg">
                            <i class="fa-solid fa-envelope"></i>
                            info@valenteoptic.bg
                        </a>
                    </span>

                    <span>
                        <a href="tel:+359000000000">
                            <i class="fa-solid fa-phone"></i>
                            +359 000 000 000
                        </a>
                    </span>

                </div>

                <div class="social-profile">

                    <a href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                </div>

            </div>

            <a href="javascript:void(0)" id="res-cross">
                <i class="fa-regular fa-circle-xmark"></i>
            </a>

        </div>

    </div>
</header>
