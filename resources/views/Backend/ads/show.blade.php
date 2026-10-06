<x-backend>

    @section('SEO')
        <title>{{ $details->company_name }} | Моите реклами</title>
    @endsection


    <div class="profile-page">

        {{-- PAGE HEADING --}}
        <div>

            <div class="heading two">

                <h6>
                    МОИТЕ РЕКЛАМИ
                </h6>

                <h2>
                    {{ $details->company_name }}
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Преглед на информацията и материалите,
                    които сте изпратили за тази реклама.
                </p>

            </div>

        </div>


        <hr>


        <section class="profile-section mb-5">

            {{-- BASIC INFORMATION --}}
            <div class="heading two mb-4">

                <h6>
                    БИЗНЕС
                </h6>

                <h2>
                    Основна информация
                </h2>

            </div>


            <div class="user-details-grid mb-5">

                {{-- AD ID --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Реклама #
                    </p>

                    <p class="user-details-value">
                        #{{ $details->id }}
                    </p>

                </div>


                {{-- COMPANY --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Име на компанията / услугата
                    </p>

                    <p class="user-details-value">
                        {{ $details->company_name }}
                    </p>

                </div>


                {{-- CITY --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Град
                    </p>

                    <p class="user-details-value">
                        {{ $details->city }}
                    </p>

                </div>


                {{-- PHONE --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Телефон
                    </p>

                    <p class="user-details-value">

                        <a
                            href="tel:{{ $details->phone }}"
                            class="user-details-link"
                        >
                            {{ $details->phone }}
                        </a>

                    </p>

                </div>


                {{-- WEBSITE --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Уебсайт
                    </p>

                    <p class="user-details-value">

                        @if ($details->website)

                            <a
                                href="{{ $details->website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="user-details-link"
                            >
                                {{ $details->website }}
                            </a>

                        @else

                            <span class="user-details-empty">
                                Не е добавен
                            </span>

                        @endif

                    </p>

                </div>


                {{-- CREATED --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Изпратена на
                    </p>

                    <p class="user-details-value">
                        {{ $details->created_at->format('d.m.Y H:i') }}
                    </p>

                </div>


                {{-- BUSINESS DESCRIPTION --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Описание на бизнеса
                    </p>

                    <p class="user-details-value description">
                        {{ $details->business_description }}
                    </p>

                </div>


                {{-- BRAND INFORMATION --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Информация за бранда
                    </p>

                    <p class="user-details-value description">
                        {{ $details->brand_information ?? 'Не е добавена информация за бранда.' }}
                    </p>

                </div>


                {{-- VIDEO REQUIREMENTS --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Допълнителни изисквания към видео рекламата
                    </p>

                    <p class="user-details-value description">
                        {{ $details->video_ad_requirements ?? 'Няма добавени допълнителни изисквания.' }}
                    </p>

                </div>


                {{-- NOTES --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Допълнителни бележки
                    </p>

                    <p class="user-details-value description">
                        {{ $details->additional_notes ?? 'Няма добавени допълнителни бележки.' }}
                    </p>

                </div>

            </div>


            {{-- FILES --}}
            <div class="heading two mb-4">

                <h6>
                    ФАЙЛОВЕ
                </h6>

                <h2>
                    Качени материали
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Лого, изображения, видеа и гласови записи,
                    които сте предоставили за рекламата.
                </p>

            </div>


            <div class="user-details-grid">

                {{-- LOGO --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Лого
                    </p>

                    @if ($details->logo)

                        <a
                            href="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                            target="_blank"
                        >

                            <img
                                src="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                                alt="{{ $details->company_name }} Logo"
                                class="user-details-logo"
                            >

                        </a>

                    @else

                        <p class="user-details-value">

                            <span class="user-details-empty">
                                Няма качено лого
                            </span>

                        </p>

                    @endif

                </div>


                {{-- IMAGES --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Изображения
                    </p>

                    @if (!empty($details->images))

                        <div class="user-details-images">

                            @foreach ($details->images as $image)

                                <a
                                    href="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                    target="_blank"
                                >

                                    <img
                                        src="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                        alt="Business Image"
                                        class="user-details-image"
                                    >

                                </a>

                            @endforeach

                        </div>

                    @else

                        <p class="user-details-value">

                            <span class="user-details-empty">
                                Няма качени изображения
                            </span>

                        </p>

                    @endif

                </div>


                {{-- VIDEOS --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Видеа
                    </p>

                    @if (!empty($details->videos))

                        <div class="user-details-videos">

                            @foreach ($details->videos as $video)

                                <video
                                    controls
                                    preload="metadata"
                                    class="user-details-video"
                                >

                                    <source
                                        src="{{ asset('assets/img/dashboard/business_video/' . $video) }}"
                                    >

                                    Вашият браузър не поддържа видео.

                                </video>

                            @endforeach

                        </div>

                    @else

                        <p class="user-details-value">

                            <span class="user-details-empty">
                                Няма качени видеа
                            </span>

                        </p>

                    @endif

                </div>


                {{-- VOICE RECORDING --}}
                <div class="user-details-card full-width">

                    <p class="user-details-label">
                        Запис на глас
                    </p>

                    @if ($details->voice_recording)

                        <audio
                            controls
                            preload="metadata"
                            class="user-details-audio"
                        >

                            <source
                                src="{{ asset('assets/img/dashboard/business_audio/' . $details->voice_recording) }}"
                            >

                            Вашият браузър не поддържа аудио.

                        </audio>

                    @else

                        <p class="user-details-value">

                            <span class="user-details-empty">
                                Няма качен запис на глас
                            </span>

                        </p>

                    @endif

                </div>

            </div>


            {{-- BACK --}}
            <div class="mt-5">

                <a
                    href="{{ route('ads.index') }}"
                    class="btn"
                >
                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Назад към рекламите
                </a>

            </div>

        </section>

    </div>

</x-backend>
