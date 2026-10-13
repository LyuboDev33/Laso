<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Вход | Оптика Valente</title>

    <meta name="description"
        content="Влезте в своя профил, за да управлявате поръчки, резервации и настройките на акаунта си.">

    <meta name="robots" content="noindex,nofollow">

    <meta property="og:title" content="Вход | Оптика Valente">
    <meta property="og:description" content="Влезте в своя профил и продължете оттам, докъдето сте стигнали.">
    <meta property="og:type" content="website">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

          <!-- jQuery -->
    <script src="/assets/js/jquery-3.6.0.min.js?v=<?= time() ?>"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/font-awesome-all.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/responsive.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/auth.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="/assets/css/style.css?v=<?php echo time(); ?>" />


</head>

<body>

    <div class="auth log-register-form">
        <div class="auth__container">

            {{-- ЛЯВА ЧАСТ: Форма --}}
            <div class="auth__side auth__side--left">
                <div class="auth__form">

                    <div class="text-center">
                        <div class="auth__logo">
                            <x-logo width="200" />
                        </div>

                        <div class="auth__title">
                            Добре дошли отново!
                        </div>

                        <p class="auth__description">
                            Влезте в профила си и продължете оттам,
                            докъдето сте стигнали.
                        </p>
                    </div>


                    <form action="{{ route('login') }}" method="POST" class="content-form auth__content-form">
                        @csrf

                        {{-- EMAIL --}}
                        <div class="auth__field">
                            <label for="formEmail" class="auth__label">
                                Имейл
                            </label>

                            <div class="auth__input-wrapper">
                                <input type="email" name="email" id="formEmail" placeholder="Имейл адрес"
                                    value="{{ old('email') }}" autocomplete="email" required>
                            </div>

                            @error('email')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div class="auth__field">
                            <label for="formPassword" class="auth__label">
                                Парола
                            </label>

                            <div class="auth__input-wrapper auth__password-wrapper">
                                <input type="password" name="password" id="formPassword" class="auth__password-input"
                                    placeholder="Парола" autocomplete="current-password" required>

                                <button type="button" class="auth__input-addon" data-toggle-password="formPassword"
                                    aria-label="Покажи паролата" aria-pressed="false">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <p class="auth__error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FORGOT PASSWORD --}}
                        @if (Route::has('password.request'))
                            <div class="auth__forgot">
                                <a href="{{ route('password.request') }}" class="auth__link">
                                    Забравена парола?
                                </a>
                            </div>
                        @endif

                        {{-- SUBMIT --}}
                        <div class="auth__submit">
                            <button type="submit" class="btn auth__submit-button">
                                Вход
                            </button>
                        </div>

                        {{-- REGISTER --}}
                        @if (Route::has('register'))
                            <p class="auth__signup">
                                Нямате акаунт?

                                <a href="{{ route('register') }}" class="auth__link">
                                    Регистрирайте се
                                </a>
                            </p>
                        @endif
                    </form>


                </div>
            </div>

            {{-- ДЯСНА ЧАСТ --}}
            <div class="auth__side auth__side--right"
                style="
                    background-image:url('{{ asset('/assets/img/auth/login-illustrate.svg') }}');
                    background-size:cover;
                    background-position:top;
                ">
            </div>

        </div>
    </div>

    <script src="/assets/js/custom.js?v=<?= time() ?>"></script>


</body>

</html>
