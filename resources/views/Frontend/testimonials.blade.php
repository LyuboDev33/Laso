<x-frontend>


@section('SEO')
    <!-- Primary SEO -->
    <title>Отзиви и мнения на клиенти за LASO | Реални истории</title>

    <meta name="description"
        content="Вижте реални отзиви и видео мнения на клиенти за LASO. Разберете как бизнеси използват нашите Meta и Facebook реклами, за да достигат до потенциални клиенти.">

    <meta name="keywords"
        content="LASO отзиви, LASO мнения, мнения за LASO, клиентски отзиви, видео отзиви, Meta реклама, Facebook реклама, реклама за малък бизнес, lead generation, клиентски истории">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="bg_BG">
    <meta property="og:site_name" content="LASO">

    <meta property="og:title"
        content="Отзиви и мнения на клиенти за LASO | Реални истории">

    <meta property="og:description"
        content="От хора, които вече използват LASO. Разгледайте видео отзиви и мнения на собственици на бизнеси за работата им с нашата услуга за Meta реклама.">

    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:image" content="{{ asset('assets/images/seo.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/images/seo.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="LASO – Отзиви и мнения на клиенти">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
        content="Отзиви и мнения на клиенти за LASO">

    <meta name="twitter:description"
        content="Вижте какво споделят реални бизнеси за LASO. Видео отзиви, клиентски истории и мнения за нашите Meta рекламни услуги.">

    <meta name="twitter:image" content="{{ asset('assets/images/seo.jpg') }}">

  
@endsection



    <section class="hero-section-one">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-one-text">
                        <h1>ОТ ХОРА, КОИТО ВЕЧЕ ГО ИЗПОЛЗВАТ</h1>
                        <h5>Виж какво споделят бизнеси, които вече използват услугите на LASO.</h5>
                        <div>
                            <a href="#see-reviews" class="btn">Виж отзивите</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-one-img">
                        <img src="assets/img/hero-one-img.png" alt="hero-one-img">
                        <div class="shaps-hero"><img src="assets/img/shaps-1.png" alt="dots-shaps" class="shaps-1">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" client-reviews pb-100">
        <div class="container">
            <div class="client">
                <div class="client-text">
                    <i class="quote">
                        <img src="assets/img/quote.png" alt="quote">
                    </i>

                    <div id="testimonialSplide" class="splide client-slider">
                        <div class="splide__track">
                            <div class="splide__list">

                                <div class="splide__slide">
                                    <div class="item">
                                        <ul class="star">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>

                                        <p>
                                            LASO ни помогна да достигаме по-прецизно до хора с реален интерес към нашите
                                            спектакли и да превръщаме този интерес в реални резултати и продажба на
                                            билети.
                                        </p>

                                        <div class="d-flex flex-column gap-2 align-items-center">
                                            <h4>Боян Иванов, Директор</h4>
                                            <span>Драматичен театър „Сава Огнянов“ – Русе</span>
                                            <div class="d-flex gap-2">
                                                  <a class="btn w-fit" target="_blank"
                                                href="/assets/pdfs/pismopodkrepa.pdf">Виж файл</a>
                                                 {{-- <a class="btn w-fit" target="_blank"
                                                href="/assets/pdfs/pismopodkrepa.pdf">Отвори сайт</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="splide__slide">
                                    <div class="item">
                                        <ul class="star">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                        </ul>

                                        <p>
                                            Благодаря на LASO за професионалната работа! Постигнахме целта си –
                                            увеличаване на производството чрез привличане на нови клиенти на едро.
                                            Доверих им се и не съжалявам
                                        </p>

                                        <h4>Мирослава Кръстева</h4>
                                        <span>Собственик на Bear’s Delight</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="/assets/img/testimonials/test-1.png" class="quote-1" alt="img">
        <img src="/assets/img/testimonials/test-2.jpeg" class="quote-2" alt="img">
        <img src="/assets/img/testimonials/test-3.jpeg" class="quote-3" alt="img">
        <img src="/assets/img/testimonials/test-4.jpeg" class="quote-4" alt="img">
        <img src="/assets/img/testimonials/test-5.jpeg" class="quote-5" alt="img">
    </section>


{{--
    <section class="container pb-200" id="see-reviews">


        <div class="row">

            <!-- DMD Health -->
            <div class="col-lg-6 col-md-6 col-12 mb-5">

                <div class="video position-relative">

                    <a data-fancybox="" href="https://player.vimeo.com/video/1232024925?h=9a33613716">
                        <i>
                            <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z" fill="#fff"></path>
                            </svg>
                        </i>
                    </a>

                    <img src="/assets/img/testimonials/denitsa.jpeg" alt="Деница Драгомирова - DMD Health">

                </div>

                <div class="mt-20">
                    <h4 class="mt-1">Деница Драгомирова</h4>

                    <span class="d-block">
                        General Manager
                    </span>

                    <a class="btn" target="_blank" href="https://www.facebook.com/profile.php?id=61554797821753">
                        Виж DMD Health
                    </a>
                </div>

            </div>

            <!-- Studio Shift -->
            <div class="col-lg-6 col-md-6 col-12 mb-5">

                <div class="video position-relative">

                    <a data-fancybox="" href="https://player.vimeo.com/video/1232027446?h=8da90e4e5d">
                        <i>
                            <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z" fill="#fff"></path>
                            </svg>
                        </i>
                    </a>

                    <img src="/assets/img/testimonials/iliya-kostadinov.jpeg" alt="Илия Костадинов - Studio Shift">

                </div>

                <div class="mt-20">
                    <h4 class="mt-1">Илия Костадинов</h4>

                    <span class="d-block">
                        Собственик, Хиропрактор
                    </span>

                    <a class="btn" target="_blank" href="https://www.facebook.com/profile.php?id=61569763866475">
                        Виж Studio Shift
                    </a>
                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-12 mb-5">

                <div class="video position-relative">

                    <a data-fancybox="" href="https://player.vimeo.com/video/1233698096?h=8445de499b">
                        <i>
                            <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z" fill="#fff"></path>
                            </svg>
                        </i>
                    </a>

                    <img src="/assets/img/testimonials/miroslava-matsureva.jpeg"
                        alt="Деница Драгомирова - DMD Health">

                </div>

                <div class="mt-20">
                    <h4 class="mt-1">Мирослава Мацурева</h4>

                    <span class="d-block">
                        Психолог и психотерапевт
                    </span>

                    <a class="btn" target="_blank" href="https://mira-therapy.com/">
                        Виж Albeta Integra
                    </a>
                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-12 mb-5">

                <div class="video position-relative">

                    <a data-fancybox="" href="https://player.vimeo.com/video/1242040900?h=3d62306f57">
                        <i>
                            <svg width="11" height="17" viewBox="0 0 11 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z" fill="#fff"></path>
                            </svg>
                        </i>
                    </a>

                    <img src="/assets/img/testimonials/desislava-todorova.jpeg"
                        alt="Деница Драгомирова - DMD Health">

                </div>

                <div class="mt-20">
                    <h4 class="mt-1">Десислава Тодорова</h4>

                    <span class="d-block">
                        собственик
                    </span>

                    <a class="btn" target="_blank" href="https://motorettakids.com/">
                        Виж Motoretta Kids
                    </a>
                </div>

            </div>


        </div>

    </section> --}}


<section
    id="see-reviews"
    class="gap"
    style="background-image: url('/assets/img/background-1.png');">

    <div class="container">

        <div class="row g-4">

            <!-- DMD Health -->
            <div class="col-lg-6 col-md-6 col-12">

                <div class="blog our-blog img-hover">

                    <div class="blog-img">
                        <figure>
                            <a
                                data-fancybox="reviews"
                                href="https://player.vimeo.com/video/1232024925?h=9a33613716">

                                <img
                                    src="/assets/img/testimonials/denitsa.jpeg"
                                    alt="Деница Драгомирова - DMD Health">

                            </a>
                        </figure>
                    </div>

                    <div class="our-blog-text">

                        <h2>Деница Драгомирова</h2>

                        <p>General Manager</p>

                        <a
                            class="btn"
                            href="https://www.facebook.com/profile.php?id=61554797821753"
                            target="_blank"
                            rel="noopener noreferrer">
                            Виж DMD Health
                        </a>

                    </div>

                </div>

            </div>

            <!-- Studio Shift -->
            <div class="col-lg-6 col-md-6 col-12">

                <div class="blog our-blog img-hover">

                    <div class="blog-img">
                        <figure>
                            <a
                                data-fancybox="reviews"
                                href="https://player.vimeo.com/video/1232027446?h=8da90e4e5d">

                                <img
                                    src="/assets/img/testimonials/iliya-kostadinov.jpeg"
                                    alt="Илия Костадинов - Studio Shift">

                            </a>
                        </figure>
                    </div>

                    <div class="our-blog-text">

                        <h2>Илия Костадинов</h2>

                        <p>Собственик, Хиропрактор</p>

                        <a
                            class="btn"
                            href="https://www.facebook.com/profile.php?id=61569763866475"
                            target="_blank"
                            rel="noopener noreferrer">
                            Виж Studio Shift
                        </a>

                    </div>

                </div>

            </div>

            <!-- Albeta Integra -->
            <div class="col-lg-6 col-md-6 col-12">

                <div class="blog our-blog img-hover">

                    <div class="blog-img">
                        <figure>
                            <a
                                data-fancybox="reviews"
                                href="https://player.vimeo.com/video/1233698096?h=8445de499b">

                                <img
                                    src="/assets/img/testimonials/miroslava-matsureva.jpeg"
                                    alt="Мирослава Мацурева - Albeta Integra">

                            </a>
                        </figure>
                    </div>

                    <div class="our-blog-text">

                        <h2>Мирослава Мацурева</h2>

                        <p>Психолог и психотерапевт</p>

                        <a
                            class="btn"
                            href="https://mira-therapy.com/"
                            target="_blank"
                            rel="noopener noreferrer">
                            Виж Albeta Integra
                        </a>

                    </div>

                </div>

            </div>

            <!-- Motoretta Kids -->
            <div class="col-lg-6 col-md-6 col-12">

                <div class="blog our-blog img-hover">

                    <div class="blog-img">
                        <figure>
                            <a
                                data-fancybox="reviews"
                                href="https://player.vimeo.com/video/1242040900?h=3d62306f57">

                                <img
                                    src="/assets/img/testimonials/desislava-todorova.jpeg"
                                    alt="Десислава Тодорова - Motoretta Kids">

                            </a>
                        </figure>
                    </div>

                    <div class="our-blog-text">

                        <h2>Десислава Тодорова</h2>

                        <p>Собственик</p>

                        <a
                            class="btn"
                            href="https://motorettakids.com/"
                            target="_blank"
                            rel="noopener noreferrer">
                            Виж Motoretta Kids
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





</x-frontend>
