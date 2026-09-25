<x-frontend>

    @section('SEO')
        <title>404 - Страницата не е намерена</title>
    @endsection

    <section class="error-page">
        <div class="container">

            <div class="error-page__inner">

                <div class="error-page__visual">
                    <span class="error-page__circle error-page__circle--one"></span>
                    <span class="error-page__circle error-page__circle--two"></span>

                    <div class="error-page__title-box">
                        <span class="error-page__dot"></span>

                        <h1 class="error-page__title">
                            404
                        </h1>
                    </div>
                </div>

                <div class="error-page__content">

                    <span class="error-page__label">
                        Страницата не е намерена
                    </span>

                    <h2 class="error-page__tagline">
                        Упс... изглежда се изгубихме.
                    </h2>

                    <p class="error-page__text">
                        Страницата, която търсите, не съществува,
                        преместена е или адресът е въведен неправилно.
                    </p>

                    <div class="error-page__btn-box">
                        <a href="/" class="error-page__btn">
                            Към началната страница

                            <span class="error-page__btn-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

</x-frontend>

