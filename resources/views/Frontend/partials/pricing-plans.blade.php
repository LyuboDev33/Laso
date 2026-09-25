<div class="row align-items-stretch">

    {{-- BASIC --}}
    <div class="col-lg-4 col-md-6 mb-4">

        <div class="pricing-two h-100" style="background-image: url(/assets/img/background-p.png);">

            <div class="month">

                <h5>
                    BASIC
                </h5>

                <p class="mb-3">
                    За бизнеси, които искат да започнат
                </p>

                <h4>
                    €65<sub>/месец</sub>
                </h4>

                <div class="mt-3">
                    <strong class="text-white">€699 / година</strong>
                </div>

                <small class="d-block mt-1">
                    <em class="text-white">Спестявате €81 при годишно плащане</em>
                </small>

            </div>


            <div class="pricing-two-text">

                <p>
                    <strong>
                        Основно решение за генериране на запитвания
                        от потенциални клиенти.
                    </strong>
                </p>


                <ul class="list">

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Meta lead generation кампания
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        1 видео рекламно съдържание <em>(еднократно)</em>
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        1 бизнес услуга или рекламен ъгъл
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Рекламно присъствие 3 дни седмично
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Управление и оптимизация на кампанията
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Клиентски LASO профил
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Проследяване на запитванията
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Имейл поддръжка — до 1 support request месечно
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Без дългосрочен договор
                    </li>

                </ul>


                <div class="mt-4 mb-4">

                    <strong class="text-white">
                        Подходящ за:
                    </strong>

                    <p class="mt-2 mb-0">
                        Микро бизнеси, индивидуални професионалисти и
                        доставчици на услуги, които искат да започнат
                        да генерират запитвания онлайн по лесен и
                        достъпен начин.
                    </p>

                </div>


                @if (!Auth::check())

                    <p class="alert alert-danger text-danger rounded-3">
                        Трябва да имате акаунт, за да закупите план.
                    </p>

                    <div class="pickup d-flex gap-2">

                        <a href="{{ route('login') }}" class="btn">
                            Вход
                        </a>

                        <a href="{{ route('register') }}" class="btn">
                            Регистрация
                        </a>

                    </div>

                @elseif (!Auth::user()->facebook_page)

                    <p class="alert alert-danger text-danger rounded-3">
                        За да си купите план, моля оставете линк към
                        вашата Facebook страница.
                    </p>

                    <a href="{{ route('dashboard') }}" class="btn">
                        Към профила
                    </a>

                @else

                    <div class="d-flex flex-wrap gap-2">

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1U1rN30XJPJxSgBOzr2SkEE6',
                                'plan' => 'basic_montly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                                Закупи план €65 / месец
                            </button>
                        </form>

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1UFtU50XJPJxSgBO7UXFKk16',
                                'plan' => 'basic_yearly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                               Закупи план €699 / година
                            </button>
                        </form>

                    </div>

                @endif

            </div>

        </div>

    </div>
    {{-- BASIC END --}}


    {{-- GROWTH --}}
    <div class="col-lg-4 col-md-6 mb-4">

        <div
            class="pricing-two pricing-two--recommended h-100 position-relative"
            style="background-image: url(/assets/img/background-p.png);"
        >

            <div class="pricing-recommended">
                ПРЕПОРЪЧАН
            </div>


            <div class="month">

                <h5>
                    GROWTH
                </h5>

                <p class="mb-3">
                    За бизнеси, които искат повече
                </p>

                <div class="pricing-old-price">
                    €149 / месец
                </div>

                <h4>
                    €129<sub>/месец</sub>
                </h4>

                <div class="mt-3">
                    <strong class="text-white">€1,399 / година</strong>
                </div>

                <small class="d-block mt-1">
                    <em class="text-white">Спестявате €149 при годишно плащане</em>
                </small>

            </div>


            <div class="pricing-two-text">

                <p>
                    <strong>
                        По-активно рекламно присъствие и възможност
                        за тестване на различни услуги и рекламни подходи.
                    </strong>
                </p>


                <ul class="list">

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Meta lead generation кампания
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        1 видео + 1 статично рекламно съдържание
                        <em>(еднократно)</em>
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Различни услуги или рекламни ъгли в рамките на един бизнес
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Рекламно присъствие 5 дни седмично
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Управление и постоянна оптимизация
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Клиентски LASO профил
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Проследяване на запитванията
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Разширена имейл поддръжка — до 2 support requests месечно
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Без дългосрочен договор
                    </li>

                </ul>


                <div class="mt-4 mb-4">

                    <strong class="text-white">
                        Подходящ за:
                    </strong>

                    <p class="mt-2 mb-0">
                        Развиващи се малки и средни бизнеси и доставчици
                        на услуги, които предлагат повече от една услуга
                        или искат да тестват различни рекламни подходи.
                    </p>

                </div>


                @if (!Auth::check())

                    <p class="alert alert-danger text-danger rounded-3">
                        Трябва да имате акаунт, за да закупите план.
                    </p>

                    <div class="pickup d-flex gap-2">

                        <a href="{{ route('login') }}" class="btn">
                            Вход
                        </a>

                        <a href="{{ route('register') }}" class="btn">
                            Регистрация
                        </a>

                    </div>

                @elseif (!Auth::user()->facebook_page)

                    <p class="alert alert-danger text-danger rounded-3">
                        За да си купите план, моля оставете линк към
                        вашата Facebook страница.
                    </p>

                    <a href="{{ route('dashboard') }}" class="btn">
                        Към профила
                    </a>

                @else

                    <div class="d-flex flex-wrap gap-2">

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1UFtVx0XJPJxSgBOOFabY5hx',
                                'plan' => 'growth_monthly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                            Закупи план    €129 / месец
                            </button>
                        </form>

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1UFtZ30XJPJxSgBOxhh5pJpO',
                                'plan' => 'growth_yearly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                              Закупи план  €1,399 / година
                            </button>
                        </form>

                    </div>

                @endif

            </div>

        </div>

    </div>
    {{-- GROWTH END --}}


    {{-- PREMIUM --}}
    <div class="col-lg-4 col-md-6 mb-4">

        <div class="pricing-two h-100" style="background-image: url(/assets/img/background-p.png);">

            <div class="month">

                <h5>
                    PREMIUM
                </h5>

                <p class="mb-3">
                    За бизнеси, които искат максимално рекламно присъствие
                </p>

                <h4>
                    €229<sub>/месец</sub>
                </h4>

                <div class="mt-3">
                    <strong class="text-white">€2,399 / година</strong>
                </div>

                <small class="d-block mt-1">
                    <em class="text-white">Спестявате €349 при годишно плащане</em>
                </small>

            </div>


            <div class="pricing-two-text">

                <p>
                    <strong>
                        По-висока рекламна активност, повече рекламни
                        материали и повече възможности за тестване.
                    </strong>
                </p>


                <ul class="list">

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Meta lead generation кампания
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        2 видео + 2 статични рекламни съдържания
                        <em>(еднократно)</em>
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Различни услуги или рекламни ъгли в рамките на един бизнес
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Рекламно присъствие 7 дни седмично
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Управление и постоянна оптимизация
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Клиентски LASO профил
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Проследяване на запитванията
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Приоритетна имейл поддръжка — до 4 support requests месечно
                    </li>

                    <li>
                        <img src="/assets/img/check.png" alt="check">
                        Без дългосрочен договор
                    </li>

                </ul>


                <div class="mt-4 mb-4">

                    <strong class="text-white">
                        Подходящ за:
                    </strong>

                    <p class="mt-2 mb-0">
                        Развиващи се и по-големи бизнеси, които искат
                        постоянно генериране на потенциални клиенти,
                        да популяризират различни услуги или предложения
                        или да изграждат собствена база от потенциални
                        клиенти за последващ контакт, например за newsletter,
                        консултации или специални предложения.
                    </p>

                </div>


                @if (!Auth::check())

                    <p class="alert alert-danger text-danger rounded-3">
                        Трябва да имате акаунт, за да закупите план.
                    </p>

                    <div class="pickup d-flex gap-2">

                        <a href="{{ route('login') }}" class="btn">
                            Вход
                        </a>

                        <a href="{{ route('register') }}" class="btn">
                            Регистрация
                        </a>

                    </div>

                @elseif (!Auth::user()->facebook_page)

                    <p class="alert alert-danger text-danger rounded-3">
                        За да си купите план, моля оставете линк към
                        вашата Facebook страница.
                    </p>

                    <a href="{{ route('dashboard') }}" class="btn">
                        Към профила
                    </a>

                @else

                    <div class="d-flex flex-wrap gap-2">

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1UFtbb0XJPJxSgBOaL5jMZhK',
                                'plan' => 'premium_monthly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                             Закупи план  €229 / месец
                            </button>
                        </form>

                        <form
                            action="{{ route('subscription.create', [
                                'priceId' => 'price_1UFtiq0XJPJxSgBOt2QKvVbz',
                                'plan' => 'premium_yearly',
                            ]) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn subscription-button">
                             Закупи план   €2,399 / година
                            </button>
                        </form>

                    </div>

                @endif

            </div>

        </div>

    </div>
    {{-- PREMIUM END --}}

</div>


{{-- BENEFITS --}}
<div class="row justify-content-center mt-5">

    <div class="col-lg-12">

        <ul class="list d-flex justify-content-center align-items-center flex-wrap gap-4">

            <li>
                <img src="/assets/img/check.png" alt="check">

                Без дългосрочен договор
            </li>

            <li>
                <img src="/assets/img/check.png" alt="check">

                Месечно или годишно плащане
            </li>

            <li>
                <img src="/assets/img/check.png" alt="check">

                Възможност за прекратяване по всяко време
            </li>

        </ul>

    </div>

</div>
