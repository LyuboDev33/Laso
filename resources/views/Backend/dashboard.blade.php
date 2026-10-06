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


                {{-- <div class="alert alert-warning mb-4">

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

                </div> --}}


                {{-- <div class="alert alert-danger mb-4">

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

                </div> --}}


                <form method="POST" id="facebook-page-form" action="{{ route('profile.facebook-page.update') }}"
                    class="content-form mb-2">
                    @csrf
                    @method('PATCH')

                    <label for="facebook_page_url" class="mb-2">
                        Линк към Facebook страницата
                    </label>

                    <input id="facebook_page_url" type="url" name="facebook_page_url"
                        value="{{ Auth::user()->facebook_page }}"
                        placeholder="Пример: https://www.facebook.com/your-business-page">

                    {{-- @error('facebook_page_url')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror --}}


                    <button class="btn">
                        Добави страницата
                    </button>



                    <p class="mt-3 mb-0">
                        Ако не знаете как да намерите линка към страницата си или все още
                        нямате Facebook страница, можете да използвате нашите видео уроци,
                        които ще ви покажат процеса стъпка по стъпка.
                    </p>

                </form>

                {{-- @if (session('successFacebookUpdate'))
                    <div class="alert alert-success">Вие успешно добавихте своята Facebook страница.</div>
                @endif --}}

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


                @include('Frontend.partials.pricing-plans')


            </section>
            {{-- PRICING END --}}
        @else
            <hr>


            {{-- USER ALREADY SUBSCRIBED --}}
            <section class="profile-section">

                <div class="heading two">

                    <h6>
                        АКТИВЕН АБОНАМЕНТ
                    </h6>

                    <h2>
                        Нека подготвим вашата рекламна кампания
                    </h2>

                    <p class="pt-lg-3 pt-md-2">
                        Вашият абонамент е активен. Следващата стъпка е да ни предоставите
                        необходимата информация и материали за вашия бизнес.
                    </p>

                    <p>
                        Тази информация ще ни помогне да разберем по-добре вашата дейност,
                        услугите, които предлагате, вашия бранд и начина, по който искате
                        да бъде представен във видео рекламите.
                        Моля, попълнете задължителните полета възможно най-подробно.
                    </p>

                </div>


                <hr class="my-5">


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

    <script>
        $(document).ready(function() {
            updateFacebookPage();
        });


        function updateFacebookPage() {

            $(document).on('submit', '#facebook-page-form', function(e) {

                e.preventDefault();

                const form = $(this);
                const input = $('#facebook_page_url');
                const button = form.find('button[type="submit"]');

                // Remove previous messages
                form.find('.facebook-page-error').remove();
                form.find('.facebook-page-success').remove();

                button.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),

                    success: function(response) {

                        console.log(response);


                        if (!response.success) {
                            return;
                        }

                        input.after(`
                        <div class="alert alert-success mt-2 mb-4 facebook-page-success w-fit">
                            ${response.message}
                        </div>
                    `);

                        setTimeout(() => {
                            window.location.reload()
                        }, 5000);

                    },

                    error: function(xhr) {

                        if (xhr.status === 422) {

                            const message =
                                xhr.responseJSON.errors?.facebook_page_url?.[0] ??
                                'Моля въведете правилен линк';

                            input.after(`
                            <div class="text-danger mt-2 mb-2 facebook-page-error">
                                ${message}
                            </div>
                        `);

                            return;
                        }

                        input.after(`
                        <div class="text-danger mt-2 facebook-page-error">
                            Възникна грешка. Моля, опитайте отново.
                        </div>
                    `);
                    },

                    complete: function() {
                        button.prop('disabled', false);
                    }
                });

            });

        }
    </script>

</x-backend>
