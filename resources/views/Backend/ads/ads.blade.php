<x-backend>

    @section('SEO')
        <title>Моите реклами</title>
    @endsection


    <div class="profile-page">

        {{-- PAGE HEADING --}}
        <div>

            <div class="heading two">

                <h6>
                    РЕКЛАМИ
                </h6>

                <h2>
                    Моите реклами
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да преглеждате рекламите,
                    които сте изпратили към нашия екип.
                </p>

            </div>

        </div>


        <hr>


        <section class="profile-section mb-5">

            <div class="heading two mb-4">

                <h2>
                    Реклами
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо реклами:
                    <strong>{{ $ads->total() }}</strong>
                </p>

            </div>


            <div class="lead-user-box shadow-sm rounded-3 mb-4 overflow-hidden">

                <div class="lead-user-content">

                    <div class="row">

                        <div class="col-12">

                            {{-- Toolbar --}}
                            <div class="lead-toolbar">

                                <div>

                                    <h5 class="mb-1 mt-3">

                                        <i class="fa-solid fa-bullhorn me-2"></i>

                                        Моите реклами

                                    </h5>

                                    <div class="text-muted small">
                                        Всички реклами, които сте изпратили
                                    </div>

                                </div>

                                @if ($availableAds > 0)
                                    <div>
                                        <a class="btn" href="{{ route('ads.create-ad') }}">
                                            <i class="fa-solid fa-plus me-2"></i>
                                            Добави реклама
                                        </a>
                                    </div>
                                @endif

                            </div>


                            {{-- Ads table --}}
                            @if ($ads->isNotEmpty())

                                <div class="table-responsive lead-table-wrapper">

                                    <table class="table align-middle mb-0 lead-table">

                                        <thead>

                                            <tr>

                                                <th>
                                                    #
                                                </th>

                                                <th>
                                                    Компания / услуга
                                                </th>

                                                <th>
                                                    Уебсайт
                                                </th>

                                                <th>
                                                    Град
                                                </th>

                                                <th>
                                                    Телефон
                                                </th>

                                                <th>
                                                    Изпратена на
                                                </th>

                                                <th>
                                                    Преглед
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @foreach ($ads as $ad)
                                                <tr>

                                                    {{-- ID --}}
                                                    <td>
                                                        <strong>
                                                            #{{ $ad->id }}
                                                        </strong>
                                                    </td>


                                                    {{-- Company --}}
                                                    <td>

                                                        <strong>
                                                            {{ $ad->company_name }}
                                                        </strong>

                                                    </td>


                                                    {{-- Website --}}
                                                    <td>

                                                        @if ($ad->website)
                                                            <a href="{{ $ad->website }}" target="_blank"
                                                                rel="noopener noreferrer">
                                                                {{ $ad->website }}
                                                            </a>
                                                        @else
                                                            <span class="text-muted">
                                                                -
                                                            </span>
                                                        @endif

                                                    </td>


                                                    {{-- City --}}
                                                    <td>
                                                        {{ $ad->city }}
                                                    </td>


                                                    {{-- Phone --}}
                                                    <td>
                                                        {{ $ad->phone }}
                                                    </td>


                                                    {{-- Created at --}}
                                                    <td>

                                                        {{ $ad->created_at->format('d.m.Y H:i') }}

                                                    </td>


                                                    {{-- View --}}
                                                    <td>

                                                        <a href="{{ route('user.ads.show', $ad->id) }}"
                                                            class="btn btn-sm">
                                                            <i class="fa-solid fa-eye me-1"></i>
                                                            Преглед
                                                        </a>

                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>
                            @else
                                <div class="lead-empty-state">

                                    <i class="fa-solid fa-bullhorn"></i>

                                    <div>

                                        <strong>
                                            Все още нямате реклами
                                        </strong>

                                        <p class="mb-0">
                                            След като изпратите информацията за първата си реклама,
                                            тя ще се появи тук.
                                        </p>

                                    </div>

                                </div>

                            @endif


                            {{-- Pagination --}}
                            @if ($ads->hasPages())
                                <div class="mt-4">

                                    {{ $ads->links() }}

                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-backend>
