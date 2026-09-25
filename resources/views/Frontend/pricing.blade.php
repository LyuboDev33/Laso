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
        class="pt-5 pb-5"
        style="background-image: url(/assets/img/background-1.png);"
    >

        <div class="container">

            <div class="mb-5 text-center">

                <img
                    src="/assets/img/heading-img.png"
                    alt="LASO абонаментни планове"
                >

                <h6>
                    АБОНАМЕНТНИ ПЛАНОВЕ
                </h6>

                <h2>
                    Изберете план
                </h2>

                <p>
                    По-евтино от повечето абонаменти, които вече плащате всеки месец —
                    но за нещо, което реално развива бизнеса ви.
                </p>

                <p>
                    Изберете абонамента, който най-добре отговаря на вашия бизнес.
                </p>

            </div>


            @include('Frontend.partials.pricing-plans')

    

            {{-- TESTIMONIAL --}}
            <div class="row justify-content-center mt-5">

                <div class="col-lg-9">

                    <div class="mb-5 text-center">

                        <h6>
                            РЕАЛНИ РЕЗУЛТАТИ
                        </h6>

                        <h2>
                            Вижте как LASO работи за реални бизнеси
                        </h2>

                        <p>
                            Вижте как бизнеси в сферата на услугите използват LASO,
                            за да достигат до потенциални клиенти и да получават
                            реални запитвания чрез Meta реклама.
                        </p>

                    </div>


                    <div class="video position-relative">

                        <a
                            data-fancybox=""
                            href="#"
                        >

                            <i>

                                <svg
                                    width="11"
                                    height="17"
                                    viewBox="0 0 11 17"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >

                                    <path
                                        d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z"
                                        fill="#fff"
                                    ></path>

                                </svg>

                            </i>

                        </a>


                        <img
                            src="https://placehold.co/900x500?text=LASO+Видео+Отзив"
                            alt="Видео отзив от клиент на LASO"
                            class="w-100"
                        >

                    </div>


                    <div class="text-center mt-4">

                        <h4>
                            Реални запитвания. Реални бизнеси. Реални резултати.
                        </h4>

                        <p>
                            Тук ще бъде добавен видео отзив от клиент на LASO
                            с конкретен резултат от неговата рекламна кампания.
                        </p>

                    </div>

                </div>

            </div>

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
