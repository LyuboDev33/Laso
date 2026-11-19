<x-frontend>


    @section('SEO')
        <!-- Primary SEO -->
        <title>Цени и абонаментни планове за Meta реклама | LASO</title>

        <meta name="description"
            content="Разгледайте цените и абонаментните планове на LASO за Meta и Facebook реклама. Изберете месечен или годишен план за привличане на потенциални клиенти.">

        <meta name="keywords"
            content="LASO, LASO цени, абонаментни планове, цени за Meta реклама, Facebook реклама цени, Instagram реклама, Meta Ads, Facebook Ads, lead generation, генериране на запитвания, реклама за малък бизнес, абонаментна реклама, управление на реклами">

        <meta name="robots" content="index, follow, max-image-preview:large">

        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:locale" content="bg_BG">
        <meta property="og:site_name" content="LASO">

        <meta property="og:title" content="Цени и абонаментни планове за Meta реклама | LASO">

        <meta property="og:description"
            content="Изберете подходящия LASO абонамент за вашия бизнес. Meta и Facebook реклама с включен рекламен бюджет, рекламни материали и професионално управление на кампаниите.">

        <meta property="og:url" content="{{ url()->current() }}">

        <meta property="og:image" content="{{ asset('assets/images/seo.jpg') }}">
        <meta property="og:image:secure_url" content="{{ asset('assets/images/seo.jpg') }}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="LASO – Цени и абонаментни планове за Meta реклама">

        <!-- Twitter / X -->
        <meta name="twitter:card" content="summary_large_image">

        <meta name="twitter:title" content="Цени и абонаментни планове за Meta реклама | LASO">

        <meta name="twitter:description"
            content="Разгледайте абонаментните планове на LASO. Meta реклама за малкия бизнес с включен рекламен бюджет, рекламни материали и управление.">

        <meta name="twitter:image" content="{{ asset('assets/images/seo.jpg') }}">
        <meta name="twitter:image:alt" content="LASO – Абонаментни планове за Meta и Facebook реклама">
    @endsection



    <section class="pt-5 pb-200" style="background-image: url(/assets/img/background-1.png);">

        <div class="container">

            @include('Frontend.partials.pricing-plans')

        </div>

    </section>


    <x-session-message session-key="subscriptionAlreadyExists" type="warning" title="Вече имате активен абонамент"
        :modal="true" text="Вече имате активен абонамент към нашата услуга." />

    <x-session-message session-key="paymentPlansFailed" type="danger" :modal="true" title="Възникна грешка"
        text="Възникна проблем при зареждането на абонаментните планове. Моля, опитайте отново." />

    <x-session-message session-key="error_noSubscription" type="warning" :modal="true"
        title="Нямате активен абонамент"
        text="За да използвате тази функционалност, е необходимо да имате активен абонамент." />

    <x-session-message session-key="needToBeLogged" type="warning" title="Необходим е акаунт"
        text='За да се абонирате е нужно да имате акаунт в нашата система. В случай, че вече имате акаунт, натиснете "Вход" и влезте в профила си.'
        :modal="true">

        <div class="d-flex gap-2 mt-4">

            <a href="{{ route('login') }}" class="btn btn-primary">
                Вход
            </a>

            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                Регистрация
            </a>

        </div>

    </x-session-message>

</x-frontend>
