<x-backend>

    @section('SEO')
        <title>Добави реклама</title>
    @endsection


    <div class="profile-page">

        <div>

            <div class="heading two">

                <h6>
                    РЕКЛАМИ
                </h6>

                <h2>
                    Добави нова реклама
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Попълнете информацията и качете материалите,
                    които ще използваме за подготовката на вашата реклама.
                </p>

            </div>

        </div>


        <hr>


        <section class="profile-section mb-5">

            @if (!$canCreateAd)
                {{-- LIMIT REACHED --}}
                <div class="ad-limit-box">

                    <div class="ad-limit-icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                    <div>

                        <h4>
                            Надвишили сте лимита си за създаване на реклами
                        </h4>

                        <p>
                            Вашият текущ абонаментен план позволява създаването на
                            <strong>{{ $adLimit }}</strong>
                            {{ $adLimit === 1 ? 'реклама' : 'реклами' }}.
                        </p>

                        <p class="mb-0">
                            В момента имате
                            <strong>{{ $adsCount }}</strong>
                            {{ $adsCount === 1 ? 'създадена реклама' : 'създадени реклами' }}.
                        </p>

                        <div class="mt-4">

                            <a href="{{ route('ads.index') }}" class="btn">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Към моите реклами
                            </a>

                        </div>

                    </div>

                </div>
            @else
                {{-- AVAILABLE ADS --}}
                <div class="ad-availability-box mb-4">

                    <div>
                        <i class="fa-solid fa-circle-info me-2"></i>

                        Вашият план позволява
                        <strong>{{ $adLimit }}</strong>
                        {{ $adLimit === 1 ? 'реклама' : 'реклами' }}.
                    </div>

                    <div>
                        Остават ви:
                        <strong>{{ $availableAds }}</strong>
                    </div>

                </div>


                {{-- FORM --}}
                <div class="ad-form-card">

                    <form
                        id="create-ad-form"
                        class="content-form"
                        action="{{ route('user.ads.create', Auth::user()) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        <div class="row">

                            {{-- COMPANY NAME --}}
                            <div class="col-lg-4 mb-4">

                                <label for="company_name" class="ad-form-label">
                                    Име на компанията / услугата *
                                </label>

                                <input id="company_name" class="ad-form-control" type="text" name="company_name"
                                    value="{{ old('company_name') }}" placeholder="Пример: LASO" required>

                                @error('company_name')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- WEBSITE --}}
                            <div class="col-lg-4 mb-4">

                                <label for="website" class="ad-form-label">
                                    Уебсайт
                                </label>

                                <input id="website" class="ad-form-control" type="text" name="website"
                                    value="{{ old('website') }}" placeholder="Пример: https://example.com">

                                @error('website')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- CITY --}}
                            <div class="col-lg-4 mb-4">

                                <label for="city" class="ad-form-label">
                                    Град *
                                </label>

                                <input id="city" class="ad-form-control" type="text" name="city"
                                    value="{{ old('city') }}" placeholder="Пример: София" required>

                                @error('city')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- PHONE --}}
                            <div class="col-lg-4 mb-4">

                                <label for="phone" class="ad-form-label">
                                    Телефонен номер *
                                </label>

                                <input id="phone" class="ad-form-control" type="tel" name="phone"
                                    value="{{ old('phone') }}" placeholder="Пример: +359 88 123 4567" required>

                                @error('phone')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- BUSINESS DESCRIPTION --}}
                            <div class="col-lg-8 mb-4">

                                <label for="business_description" class="ad-form-label">
                                    Описание на бизнеса *
                                </label>

                                <textarea id="business_description" class="ad-form-control" name="business_description" rows="5"
                                    placeholder="Опишете с какво се занимава вашият бизнес." required>{{ old('business_description') }}</textarea>

                                @error('business_description')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- BRAND INFORMATION --}}
                            <div class="col-12 mb-4">

                                <label for="brand_information" class="ad-form-label">
                                    Информация за бранда
                                </label>

                                <textarea id="brand_information" class="ad-form-control" name="brand_information" rows="5"
                                    placeholder="Разкажете ни повече за вашия бранд – стил на комуникация, ценности, послания, цветове, визуална идентичност или друга важна информация.">{{ old('brand_information') }}</textarea>

                                @error('brand_information')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- FILES HEADING --}}
                            <div class="col-12">

                                <div class="ad-form-section-heading">

                                    <h4>
                                        Материали
                                    </h4>

                                    <p>
                                        Добавете наличните материали, които можем да използваме
                                        при създаването на рекламата.
                                    </p>

                                </div>

                            </div>


                            {{-- LOGO --}}
                            <div class="col-lg-6 mb-4">

                                <div class="ad-upload-box">

                                    <label for="logo" class="ad-form-label">
                                        <i class="fa-regular fa-image me-2"></i>
                                        Лого
                                    </label>

                                    <input id="logo" class="ad-file-input" type="file" name="logo"
                                        accept="image/*">

                                    <p>
                                        Ако разполагате с лого на вашия бизнес,
                                        можете да го прикачите тук.
                                    </p>

                                </div>

                                @error('logo')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- IMAGES --}}
                            <div class="col-lg-6 mb-4">

                                <div class="ad-upload-box">

                                    <label for="images" class="ad-form-label">
                                        <i class="fa-regular fa-images me-2"></i>
                                        Изображения
                                    </label>

                                    <input id="images" class="ad-file-input" type="file" name="images[]"
                                        accept="image/*" multiple>

                                    <p>
                                        Можете да качите снимки на продукти, услуги,
                                        обекти, екип или други подходящи изображения.
                                    </p>

                                </div>

                                @error('images')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @error('images.*')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- VIDEOS --}}
                            <div class="col-lg-6 mb-4">

                                <div class="ad-upload-box">

                                    <label for="videos" class="ad-form-label">
                                        <i class="fa-solid fa-video me-2"></i>
                                        Видеа
                                    </label>

                                    <input id="videos" class="ad-file-input" type="file" name="videos[]"
                                        accept="video/*" multiple>

                                    <p>
                                        Ако разполагате с готови видеа, заснет материал
                                        или представяне на продукт, можете да ги предоставите тук.
                                    </p>

                                </div>

                                @error('videos')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @error('videos.*')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- VOICE RECORDING --}}
                            <div class="col-lg-6 mb-4">

                                <div class="ad-upload-box">

                                    <label for="voice_recording" class="ad-form-label">
                                        <i class="fa-solid fa-microphone me-2"></i>
                                        Запис на глас
                                    </label>

                                    <input id="voice_recording" class="ad-file-input" type="file"
                                        name="voice_recording" accept="audio/*">

                                    <p>
                                        По желание можете да предоставите запис на вашия глас
                                        с продължителност до 1 минута.
                                    </p>

                                </div>

                                @error('voice_recording')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- VIDEO AD REQUIREMENTS --}}
                            <div class="col-12 mb-4">

                                <label for="video_ad_requirements" class="ad-form-label">
                                    Допълнителни изисквания към видео рекламата
                                </label>

                                <textarea id="video_ad_requirements" class="ad-form-control" name="video_ad_requirements" rows="6"
                                    placeholder="Опишете конкретни желания относно рекламата – стил, послание, сценарий, музика, начин на представяне, продукти или услуги, които задължително искате да присъстват.">{{ old('video_ad_requirements') }}</textarea>

                                <p class="ad-field-description">
                                    Ако имате конкретна идея или изисквания за това
                                    как трябва да изглежда видео рекламата, опишете ги тук.
                                </p>

                                @error('video_ad_requirements')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- ADDITIONAL NOTES --}}
                            <div class="col-12 mb-4">

                                <label for="additional_notes" class="ad-form-label">
                                    Допълнителни бележки
                                </label>

                                <textarea id="additional_notes" class="ad-form-control" name="additional_notes" rows="5"
                                    placeholder="Добавете всякаква друга информация, която смятате, че ще бъде полезна при подготовката на вашата рекламна кампания.">{{ old('additional_notes') }}</textarea>

                                @error('additional_notes')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- WHAT HAPPENS NEXT --}}
                        <div class="ad-info-box">

                            <i class="fa-solid fa-circle-info"></i>

                            <div>

                                <strong>
                                    Какво следва след попълването?
                                </strong>

                                <p>
                                    След като получим информацията и материалите за вашия бизнес,
                                    нашият екип ще ги прегледа и ще ги използва при подготовката
                                    на вашата рекламна кампания.
                                </p>

                            </div>

                        </div>


                        <div class="d-flex justify-content-end mt-4">

                            <button type="submit" class="btn">
                                <i class="fa-solid fa-paper-plane me-2"></i>
                                Създай реклама
                            </button>

                        </div>

                    </form>

                </div>
            @endif

        </section>

    </div>

    <div id="upload-loader" class="upload-loader">

        <div class="upload-loader-content">

            <img src="{{ asset('/assets/img/dashboard/808.gif') }}" alt="Качване..." class="upload-loader-gif">

            <h4>
                Вашите данни се качват, моля изчакайте
            </h4>

            <p>
                Моля, не затваряйте страницата, докато качването не приключи.
            </p>

        </div>

    </div>

    <script>
        document
            .getElementById('create-ad-form')
            .addEventListener('submit', function() {
                document.getElementById('upload-loader').classList.add('active');
            });
    </script>


</x-backend>
