<x-frontend>


@section('SEO')
    <!-- Primary SEO -->
    <title>Видео уроци за Facebook и бизнеса | LASO</title>

    <meta name="description"
        content="Разгледай безплатните видео уроци на LASO. Научи как да създадеш Facebook страница, да се свързваш с потенциални клиенти и да развиваш бизнеса си.">

    <meta name="keywords"
        content="LASO, видео уроци, Facebook страница, как да създам Facebook страница, Meta реклама, Facebook реклама, потенциални клиенти, lead generation, видео инструкции, дигитален маркетинг, малък бизнес">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="bg_BG">
    <meta property="og:site_name" content="LASO">

    <meta property="og:title"
        content="Видео уроци за Facebook и бизнеса | LASO">

    <meta property="og:description"
        content="Всичко необходимо на едно място! Кратки и практични видео инструкции за създаване на Facebook страница, комуникация с потенциални клиенти и развитие на малкия бизнес.">

    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:image" content="{{ asset('assets/images/seo.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/images/seo.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt"
        content="LASO – Видео уроци и практически инструкции за бизнеса">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title"
        content="Видео уроци за Facebook и бизнеса | LASO">

    <meta name="twitter:description"
        content="Научи как да създадеш Facebook страница и как да комуникираш с потенциални клиенти. Практични видео уроци от LASO.">

    <meta name="twitter:image" content="{{ asset('assets/images/seo.jpg') }}">

    <!-- Structured Data: CollectionPage -->

@endsection


    <section class="bannr"
        style="background-image: url(/assets/img/background-1.png);"
    >
        <div class="container">
            <div class="row align-items-end heading two">
                <div class="col-lg-6">
                    <div class="bannr-text">
                        <h2 class="text-theme">ВИДЕО УРОЦИ</h2>
                        <p class="text-black">Всичко необходимо, на едно място.
                            Кратки видео инструкции, които ти показват точно какво да направиш.</p>

                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="bannr-img">
                        <img src="/assets/img/bannr.png" alt="img">
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section
        style="background-image: url(/assets/img/background-1.png);" class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Как да създадеш Facebook страница -->
                    <div class="blog our-blog img-hover">
                        <div class="blog-img">
                            <figure>
                                <img src="/assets/img/our-blog-1.jpg" alt="Как да създадеш Facebook страница">
                            </figure>
                        </div>

                        <h5>01<span>Окт 2026</span></h5>


                        <div class="our-blog-text">
                            <a href="#">
                                <h2>Как да създадеш Facebook страница</h2>
                            </a>

                            <p>
                                Научи как да създадеш и подготвиш Facebook страница за своя бизнес стъпка по стъпка.
                            </p>


                        </div>


                    </div>


                    <!-- Как да се свържеш с потенциален клиент -->
                    <div class="blog our-blog img-hover">
                        <div class="blog-img">
                            <figure>
                                <img src="/assets/img/our-blog-1.jpg" alt="Как да се свържеш с потенциален клиент">
                            </figure>
                        </div>

                        <h5>01<span>Окт, 2026</span></h5>

                        <div class="our-blog-text">
                            <a href="#">
                                <h2>Как да се свържеш с потенциален клиент</h2>
                            </a>

                            <p>
                                Научи как да направиш първия контакт с потенциален клиент и как да започнеш разговор по
                                правилния начин.
                            </p>


                        </div>


                    </div>



                </div>
                {{-- <div class="col-lg-4">
                    <div class="sidebar">
                        <h3>Recent Posts</h3>
                        <div class="boder"></div>
                        <ul class="recent-post">
                            <li>
                                <img alt="recent-posts-img" src="assets/img/recent-posts-1.jpg">
                                <div>
                                    <a href="#">Wash Your Workwear To Last Longer?</a>
                                    <span><i class="fa-solid fa-clock"></i>March 25, 2023</span>
                                </div>
                            </li>
                            <li>
                                <img alt="recent-posts-img" src="assets/img/recent-posts-2.jpg">
                                <div>
                                    <a href="#">Wash Your Workwear To Last Longer?</a>
                                    <span><i class="fa-solid fa-clock"></i>March 25, 2023</span>
                                </div>
                            </li>
                            <li class="end">
                                <img alt="recent-posts-img" src="assets/img/recent-posts-3.jpg">
                                <div>
                                    <a href="#">Wash Your Workwear To Last Longer?</a>
                                    <span><i class="fa-solid fa-clock"></i>March 25, 2023</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar">
                        <h3>Categories</h3>
                        <div class="boder"></div>
                        <ul class="categories">
                            <li>
                                <a href="#">Creative<span>23</span></a>
                            </li>
                            <li>
                                <a href="#">Photography<span>10</span></a>
                            </li>
                            <li>
                                <a href="#">Marketing<span>09</span></a>
                            </li>
                            <li>
                                <a href="#">Unique Ideas<span>14</span></a>
                            </li>
                            <li>
                                <a href="#">Portfolio<span>12</span></a>
                            </li>
                            <li>
                                <a href="#">Identity<span>11</span></a>
                            </li>

                        </ul>
                    </div>
                    <div class="sidebar">
                        <h3>Quick Links</h3>
                        <div class="boder"></div>
                        <ul class="quick-links">
                            <li><a href="#"><i class="fa-solid fa-caret-right"></i>Website Services</a></li>
                            <li><a href="#"><i class="fa-solid fa-caret-right"></i>Revamp Services</a></li>
                            <li><a href="#"><i class="fa-solid fa-caret-right"></i>Social Management</a></li>
                            <li><a href="#"><i class="fa-solid fa-caret-right"></i>Domain &amp; Website</a></li>
                            <li class="end"><a href="#"><i class="fa-solid fa-caret-right"></i>Branding &amp;
                                    Logo</a></li>

                        </ul>
                    </div>

                    <div class="sidebar sidebar-two" style="background-image: url(assets/img/background-p.png);">
                        <h3>Newsletter</h3>
                        <div class="boder"></div>
                        <p>Enter your email and get recent news
                            and update.</p>
                        <form>
                            <input type="text" name="email" placeholder="Enter your email address...">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

</x-frontend>
