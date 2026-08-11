<x-backend>

    @section('SEO')
        <title>Админ панел</title>
    @endsection

    <div class="profile-page">

        <div class="mb-2">

            <div class="heading two">

                <h6>
                    ДОБРЕ ДОШЛИ
                </h6>

                <h2>
                    Здравейте, {{ Auth::user()->name }} 👋
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да управлявате своя профил, абонамент и процеса
                    по стартиране на рекламната ви кампания с LASO.
                </p>

            </div>

        </div>

        @if (!Auth::user()->subscriptions()->active()->exists())
            <hr>


            {{-- BEFORE PAYMENT / ONBOARDING REQUIREMENTS --}}
            <section class="profile-section mb-2">

                <div class="heading two mb-4">

                    <h6>
                        ПРЕДИ ДА ЗАКУПИТЕ АБОНАМЕНТ
                    </h6>

                    <h2>
                        Необходима информация преди плащане
                    </h2>

                    <p class="pt-lg-3 pt-md-2">
                        За да можем да подготвим и управляваме вашата Meta рекламна кампания,
                        е необходимо да разполагате с Facebook страница и Meta Business Manager.
                    </p>

                </div>


                <div class="alert alert-info mb-4">

                    <h5 class="mb-3">
                        Стъпка 1: Добавете линк към вашата Facebook страница
                    </h5>

                    <p class="mb-3">
                        За да продължите към избор и закупуване на абонаментен план,
                        е необходимо да въведете линк към Facebook страницата на вашия бизнес.
                    </p>

                    <p class="mb-0">
                        Моля, уверете се, че линкът води към страницата, която желаете
                        да използваме за рекламните кампании.
                    </p>

                </div>


                <div class="alert alert-warning mb-4">

                    <h5 class="mb-3">
                        Важно относно Meta Business Manager
                    </h5>

                    <p class="mb-3">
                        По време на процеса по онбординг ще бъде необходимо да ни предоставите
                        необходимите достъпи до вашия Meta Business Manager, рекламния акаунт
                        и Facebook страницата.
                    </p>

                    <p class="mb-3">
                        Със закупуването на абонаментен план потвърждавате, че разполагате
                        с Meta Business Manager, който може да бъде използван за рекламна дейност.
                    </p>

                    <p class="mb-0">
                        Ако не сте сигурни дали всичко по акаунта ви е настроено правилно,
                        няма проблем. След закупуването на услугата нашият екип ще извърши
                        необходимата проверка вместо вас.
                    </p>

                </div>


                <div class="alert alert-danger mb-4">

                    <h5 class="mb-3">
                        Какво се случва, ако Meta акаунтът има ограничения?
                    </h5>

                    <p class="mb-0">
                        Ако при проверката установим, че вашият Meta Business Manager,
                        рекламният акаунт или друг необходим актив има ограничения,
                        които не позволяват стартирането на рекламна кампания,
                        ще се свържем с вас и ако услугата не може да бъде изпълнена,
                        платената сума ще ви бъде възстановена.
                    </p>

                </div>


                <form method="POST" action="{{ route('profile.facebook-page.update') }}" class="content-form mb-2">
                    @csrf
                    @method('PATCH')

                    <label for="facebook_page_url" class="mb-2">
                        Линк към Facebook страницата
                    </label>

                    <input id="facebook_page_url" type="url" name="facebook_page_url"
                        value="{{ Auth::user()->facebook_page }}"
                        placeholder="Пример: https://www.facebook.com/your-business-page" required>

                    @error('facebook_page_url')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror


                    <button class="btn">
                        Добави страницата
                    </button>

                    @error('facebook_page_url')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <p class="mt-3 mb-0">
                        Ако не знаете как да намерите линка към страницата си или все още
                        нямате Facebook страница, можете да използвате нашите видео уроци,
                        които ще ви покажат процеса стъпка по стъпка.
                    </p>

                </form>

                @if (session('successFacebookUpdate'))
                    <div class="alert alert-success">Вие успешно добавихте своята Facebook страница.</div>
                @endif

            </section>
            {{-- BEFORE PAYMENT / ONBOARDING REQUIREMENTS END --}}


            <hr>


            {{-- PRICING --}}
            <section class="profile-section mb-5">

                <div class="heading two mb-5">

                    <h6>
                        АБОНАМЕНТНИ ПЛАНОВЕ
                    </h6>

                    <h2>
                        Изберете подходящ план
                    </h2>

                    <p class="pt-lg-3 pt-md-2">
                        Изберете абонаментния план, който най-добре отговаря на нуждите
                        на вашия бизнес. След успешно плащане ще продължите към процеса
                        по онбординг и подготовка на рекламната кампания.
                    </p>

                </div>


                <div class="row">


                    {{-- BASIC PLAN --}}
                    <div class="col-lg-4 col-md-6">

                        <div class="pricing-two" style="background-image: url(/assets/img/background-p.png);">

                            <div class="month">

                                <h5>
                                    Basic Plan
                                </h5>

                                <h4>
                                    $64.<span>00</span><sub>/Month</sub>
                                </h4>

                            </div>


                            <div class="pricing-two-text">

                                <p>
                                    Подходящ план за бизнеси, които искат да започнат
                                    с професионално управлявана Meta реклама.
                                </p>


                                <ul class="list">

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Управление на Meta реклама
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Lead generation кампания
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Оптимизация на кампанията
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Клиентски профил
                                    </li>

                                </ul>


                                <form
                                    action="{{ route('subscription.create', [
                                        'priceId' => 'BASIC_PRICE_ID',
                                        'plan' => 'basic',
                                    ]) }}"
                                    method="POST">

                                    @csrf

                                    <input type="hidden" name="facebook_page_url" class="facebook-page-url-hidden">

                                    @if (Auth::user()->facebook_page)
                                        <button type="submit" class="btn subscription-button">
                                            Избери план
                                        </button>
                                    @else
                                        <p class="alert alert-danger text-danger rounded-3">За да си купите план, моля
                                            оставете линк към
                                            вашата Facebook страница.</p>
                                    @endif

                                </form>

                            </div>

                        </div>

                    </div>
                    {{-- BASIC PLAN END --}}

                    {{-- PROFESSIONAL PLAN --}}
                    <div class="col-lg-4 col-md-6">

                        <div class="pricing-two" style="background-image: url(/assets/img/background-p.png);">

                            <div class="month">

                                <h5>
                                    Professional Plan
                                </h5>

                                <h4>
                                    $120.<span>00</span><sub>/Month</sub>
                                </h4>

                            </div>


                            <div class="pricing-two-text">

                                <p>
                                    Подходящ за бизнеси, които искат по-активно управление
                                    и постоянно развитие на рекламните кампании.
                                </p>


                                <ul class="list">

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Управление на Meta реклама
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Lead generation кампания
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Постоянна оптимизация
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Приоритетна поддръжка
                                    </li>

                                </ul>


                                <form
                                    action="{{ route('subscription.create', [
                                        'priceId' => 'price_1U1rN30XJPJxSgBOzr2SkEE6',
                                        'plan' => 'premium',
                                    ]) }}"
                                    method="POST">

                                    @csrf

                                    <input type="hidden" name="facebook_page_url" class="facebook-page-url-hidden">


                                    @if (Auth::user()->facebook_page)
                                        <button type="submit" class="btn subscription-button">
                                            Избери план
                                        </button>
                                    @else
                                        <p class="alert alert-danger text-danger rounded-3">За да си купите план, моля
                                            оставете линк към
                                            вашата Facebook страница.</p>
                                    @endif

                                </form>


                            </div>

                        </div>

                    </div>
                    {{-- PROFESSIONAL PLAN END --}}

                    {{-- BUSINESS PLAN --}}
                    <div class="col-lg-4 col-md-6">

                        <div class="pricing-two mb-0" style="background-image: url(/assets/img/background-p.png);">

                            <div class="month">

                                <h5>
                                    Business Plan
                                </h5>

                                <h4>
                                    $184.<span>00</span><sub>/Month</sub>
                                </h4>

                            </div>


                            <div class="pricing-two-text">

                                <p>
                                    Разширен план за бизнеси, които искат повече подкрепа,
                                    развитие и по-интензивна работа по рекламата.
                                </p>


                                <ul class="list">

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Управление на Meta реклама
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Lead generation кампания
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Разширена оптимизация
                                    </li>

                                    <li>
                                        <img src="/assets/img/check.png" alt="check">

                                        Разширена поддръжка
                                    </li>

                                </ul>


                                <form
                                    action="{{ route('subscription.create', [
                                        'priceId' => 'BUSINESS_PRICE_ID',
                                        'plan' => 'business',
                                    ]) }}"
                                    method="POST">

                                    @csrf

                                    <input type="hidden" name="facebook_page_url" class="facebook-page-url-hidden">

                                    @if (Auth::user()->facebook_page)
                                        <button type="submit" class="btn subscription-button">
                                            Избери план
                                        </button>
                                    @else
                                        <p class="alert alert-danger text-danger rounded-3">За да си купите план, моля
                                            оставете линк към
                                            вашата Facebook страница.</p>
                                    @endif

                                </form>

                            </div>

                        </div>

                    </div>
                    {{-- BUSINESS PLAN END --}}

                </div>

            </section>
            {{-- PRICING END --}}
        @else
            <hr>


            {{-- USER ALREADY SUBSCRIBED --}}
            <section class="profile-section mb-5">

                <div class="heading two">

                    <h6>
                        АКТИВЕН АБОНАМЕНТ
                    </h6>

                    <h2>
                        Вече имате активен абонамент
                    </h2>

                    <p class="pt-lg-3 pt-md-2">
                        Вашият профил вече има активен абонаментен план.
                        Можете да продължите към останалите стъпки от процеса
                        по онбординг и подготовка на вашата рекламна кампания.
                    </p>

                </div>

            </section>
            {{-- USER ALREADY SUBSCRIBED END --}}

        @endif

    </div>


    <x-session-message session-key="subscriptionAlreadyExists" type="warning" title="Вече имате активен абонамент"
        :modal="true" text="Вече имате активен абонамент към нашата услуга." />


    <x-session-message session-key="paymentPlansFailed" type="danger" :modal="true" title="Възникна грешка"
        text="Възникна проблем при зареждането на абонаментните планове. Моля, опитайте отново." />


    <x-session-message session-key="error_noSubscription" type="warning" :modal="true"
        title="Нямате активен абонамент"
        text="За да използвате тази функционалност, е необходимо да имате активен абонамент." />

</x-backend>
