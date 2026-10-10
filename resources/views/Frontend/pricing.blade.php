<x-frontend>

    @section('SEO')
        <title>Абонаментни планове | LASO</title>

        <meta
            name="description"
            content="Изберете подходящия LASO абонаментен план за управление на вашата Meta реклама и генериране на реални запитвания от потенциални клиенти."
        >

        <meta
            name="keywords"
            content="LASO, абонаментни планове, Meta реклама, lead generation, реклама за малък бизнес, Facebook реклама, Instagram реклама"
        >

        <meta
            property="og:title"
            content="Абонаментни планове | LASO"
        >

        <meta
            property="og:description"
            content="Изберете абонамента, който най-добре отговаря на вашия бизнес."
        >

        <meta
            property="og:type"
            content="website"
        >
    @endsection


    <section
        class="pt-5 pb-200"
        style="background-image: url(/assets/img/background-1.png);"
    >

        <div class="container">

            @include('Frontend.partials.pricing-plans')

        </div>

    </section>


    <x-session-message
        session-key="subscriptionAlreadyExists"
        type="warning"
        title="Вече имате активен абонамент"
        :modal="true"
        text="Вече имате активен абонамент към нашата услуга."
    />

    <x-session-message
        session-key="paymentPlansFailed"
        type="danger"
        :modal="true"
        title="Възникна грешка"
        text="Възникна проблем при зареждането на абонаментните планове. Моля, опитайте отново."
    />

    <x-session-message
        session-key="error_noSubscription"
        type="warning"
        :modal="true"
        title="Нямате активен абонамент"
        text="За да използвате тази функционалност, е необходимо да имате активен абонамент."
    />

    <x-session-message
        session-key="needToBeLogged"
        type="warning"
        title="Необходим е акаунт"
        text='За да се абонирате е нужно да имате акаунт в нашата система. В случай, че вече имате акаунт, натиснете "Вход" и влезте в профила си.'
        :modal="true"
    >

        <div class="d-flex gap-2 mt-4">

            <a
                href="{{ route('login') }}"
                class="btn btn-primary"
            >
                Вход
            </a>

            <a
                href="{{ route('register') }}"
                class="btn btn-outline-primary"
            >
                Регистрация
            </a>

        </div>

    </x-session-message>

</x-frontend>
