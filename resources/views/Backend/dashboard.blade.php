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


                <div class="heading two mb-4">

                    <h6>
                        ИНФОРМАЦИЯ ЗА БИЗНЕСА
                    </h6>

                    <h2>
                        Разкажете ни повече за вашия бизнес
                    </h2>

                    <p class="pt-lg-3 pt-md-2">
                        Полетата, отбелязани със <strong>*</strong>, са задължителни.
                        Останалите полета можете да попълните, ако разполагате
                        със съответната информация или материали.
                    </p>

                </div>


                <form class="content-form mb-5" action="{{ route('user.details.create', Auth::user()) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf


                    <div class="row">

                        {{-- COMPANY NAME --}}
                        <div class="col-lg-4 mb-4">

                            <label for="company_name" class="mb-2">
                                Име на компанията / услугата *
                            </label>

                            <input id="company_name" type="text" name="company_name"
                                value="{{ old('company_name', $details?->company_name) }}" placeholder="Пример: LASO"
                                required>

                            @error('company_name')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- WEBSITE --}}
                        <div class="col-lg-4 mb-4">

                            <label for="website" class="mb-2">
                                Уебсайт
                            </label>

                            <input id="website" type="url" name="website"
                                value="{{ old('website', $details?->website) }}"
                                placeholder="Пример: https://example.com">

                            @error('website')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- CITY --}}
                        <div class="col-lg-4 mb-4">

                            <label for="city" class="mb-2">
                                Град *
                            </label>

                            <input id="city" type="text" name="city"
                                value="{{ old('city', $details?->city) }}" placeholder="Пример: София" required>

                            @error('city')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- PHONE --}}
                        <div class="col-lg-4 mb-4">

                            <label for="phone" class="mb-2">
                                Телефонен номер *
                            </label>

                            <input id="phone" type="tel" name="phone"
                                value="{{ old('phone', $details?->phone) }}" placeholder="Пример: +359 88 123 4567"
                                required>

                            @error('phone')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BUSINESS DESCRIPTION --}}
                        <div class="col-4 mb-4">

                            <label for="business_description" class="mb-2">
                                Описание на бизнеса *
                            </label>

                            <textarea id="business_description" name="business_description" rows="7"
                                placeholder="Опишете с какво се занимава вашият бизнес." required>{{ old('business_description', $details?->business_description) }}</textarea>

                            @error('business_description')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BRAND INFORMATION --}}
                        <div class="col-4 mb-4">

                            <label for="brand_information" class="mb-2">
                                Информация за бранда
                            </label>

                            <textarea id="brand_information" name="brand_information" rows="5"
                                placeholder="Разкажете ни повече за вашия бранд – стил на комуникация, ценности, послания, цветове, визуална идентичност или друга информация, която трябва да имаме предвид.">{{ old('brand_information', $details?->brand_information) }}</textarea>

                            @error('brand_information')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- LOGO --}}
                        <div class="col-lg-3 mb-4">

                            <label for="logo" class="mb-2">
                                Лого
                            </label>

                            <input id="logo" type="file" name="logo" accept="image/*">

                            @if ($details?->logo)
                                <div class="mt-3">
                                    <p class="mb-2">
                                        Текущо лого:
                                    </p>

                                    <img src="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                                        alt="Business Logo" style="max-width: 150px; height: auto;">
                                </div>
                            @endif

                            <p class="mt-2 mb-0">
                                Ако разполагате с лого на вашия бизнес, можете да го
                                прикачите тук.
                            </p>

                            @error('logo')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- IMAGES --}}
                        <div class="col-lg-3 mb-4">

                            <label for="images" class="mb-2">
                                Изображения
                            </label>

                            <input id="images" type="file" name="images[]" accept="image/*" multiple>

                            @if ($details?->images)
                                <div class="mt-3">

                                    <p class="mb-2">
                                        Текущи изображения:
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">

                                        @foreach ($details->images as $image)
                                            <img src="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                                alt="Business Image"
                                                style="
                                    width: 80px;
                                    height: 80px;
                                    object-fit: cover;
                                ">
                                        @endforeach

                                    </div>

                                </div>
                            @endif

                            <p class="mt-2 mb-0">
                                Можете да качите снимки на продукти, услуги, обекти,
                                екип или други изображения, които бихте искали
                                да използваме при подготовката на рекламата.
                            </p>

                            @error('images')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            @error('images.*')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- VIDEOS --}}
                        <div class="col-lg-3 mb-4">

                            <label for="videos" class="mb-2">
                                Видеа
                            </label>

                            <input id="videos" type="file" name="videos[]" accept="video/*" multiple>

                            @if ($details?->videos)
                                <div class="mt-3">

                                    <p class="mb-2">
                                        Текущи видеа:
                                    </p>

                                    @foreach ($details->videos as $video)
                                        <video controls
                                            style="
                                width: 100%;
                                max-width: 200px;
                                margin-bottom: 10px;
                            ">

                                            <source
                                                src="{{ asset('assets/img/dashboard/business_video/' . $video) }}">

                                        </video>
                                    @endforeach

                                </div>
                            @endif

                            <p class="mt-2 mb-0">
                                Ако разполагате с готови видеа, заснет материал,
                                представяне на продукт или друг подходящ видеоматериал,
                                можете да го предоставите тук.
                            </p>

                            @error('videos')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            @error('videos.*')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- VOICE RECORDING --}}
                        <div class="col-lg-3 mb-4">

                            <label for="voice_recording" class="mb-2">
                                Запис на глас
                            </label>

                            <input id="voice_recording" type="file" name="voice_recording" accept="audio/*">

                            @if ($details?->voice_recording)
                                <div class="mt-3">

                                    <p class="mb-2">
                                        Текущ запис:
                                    </p>

                                    <audio controls style="width: 100%;">
                                        <source
                                            src="{{ asset('assets/img/dashboard/business_audio/' . $details->voice_recording) }}">
                                    </audio>

                                </div>
                            @endif

                            <p class="mt-2 mb-0">
                                По желание можете да предоставите запис на вашия глас
                                с продължителност до 1 минута. Записът може да бъде
                                използван с цел клониране на гласа за създаване
                                на рекламното съдържание.
                            </p>

                            @error('voice_recording')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- VIDEO AD REQUIREMENTS --}}
                        <div class="col-12 mb-4">

                            <label for="video_ad_requirements" class="mb-2">
                                Допълнителни изисквания към видео рекламата
                            </label>

                            <textarea id="video_ad_requirements" name="video_ad_requirements" rows="6"
                                placeholder="Опишете конкретни желания относно рекламата – стил, послание, сценарий, музика, начин на представяне, продукти или услуги, които задължително искате да присъстват, или други специфични изисквания.">{{ old('video_ad_requirements', $details?->video_ad_requirements) }}</textarea>

                            <p class="mt-2 mb-0">
                                Ако имате конкретна идея или изисквания за това как
                                трябва да изглежда видео рекламата, опишете ги тук.
                            </p>

                            @error('video_ad_requirements')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- ADDITIONAL NOTES --}}
                        <div class="col-12 mb-4">

                            <label for="additional_notes" class="mb-2">
                                Допълнителни бележки
                            </label>

                            <textarea id="additional_notes" name="additional_notes" rows="5"
                                placeholder="Добавете всякаква друга информация, която смятате, че ще бъде полезна при подготовката на вашата рекламна кампания.">{{ old('additional_notes', $details?->additional_notes) }}</textarea>

                            @error('additional_notes')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    <div class="alert alert-info mb-4">

                        <strong>
                            Какво следва след попълването?
                        </strong>

                        <p class="mb-0 mt-2">
                            След като получим информацията и материалите за вашия бизнес,
                            нашият екип ще ги прегледа и ще ги използва при подготовката
                            на вашата рекламна кампания.
                        </p>

                    </div>


                    <button type="submit" class="btn">

                        @if ($details)
                            Обнови информацията
                        @else
                            Запази и продължи
                        @endif

                    </button>

                </form>

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
