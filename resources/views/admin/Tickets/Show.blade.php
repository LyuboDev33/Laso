<x-backend>

    @section('SEO')
        <title>Админ | Заявка #{{ $ticket->id }}</title>
    @endsection

    <div class="profile-page">

        {{-- PAGE HEADING --}}
        <div>

            <div class="heading two">

                <h6>
                    АДМИНИСТРАЦИЯ
                </h6>

                <h2>
                    Заявка #{{ $ticket->id }}
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Преглед на заявката, изпратена от потребителя.
                </p>

            </div>

        </div>

        <hr>

        <section class="profile-section mb-5">

            {{-- ACTIONS --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

                <a href="{{ route('admin.support-tickets.index') }}"
                   class="btn">

                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Назад към заявките

                </a>

                {{-- <div class="d-flex flex-wrap gap-2">

                    @if ($ticket->user)

                        <a href="{{ route('admin.users.ads', $ticket->user) }}"
                           class="btn-custom-materials">
                            Виж рекламите
                        </a>

                        <a href="{{ route('admin.users.show', $ticket->user) }}"
                           class="btn">
                            Преглед на потребителя / План
                        </a>

                    @endif

                </div> --}}

            </div>

            {{-- USER INFORMATION --}}
            <div class="ad-form-card mb-4">

                <div class="heading two mb-4">

                    <h4>
                        <i class="fa-solid fa-user me-2"></i>
                        Информация за потребителя
                    </h4>

                </div>

                <div class="row">

                    {{-- NAME --}}
                    <div class="col-lg-4 mb-4">

                        <label class="ad-form-label">
                            Име
                        </label>

                        <div class="ad-form-control">
                            {{ $ticket->user?->name ?? 'Изтрит потребител' }}
                        </div>

                    </div>

                    {{-- EMAIL --}}
                    <div class="col-lg-4 mb-4">

                        <label class="ad-form-label">
                            Имейл
                        </label>

                        <div class="ad-form-control">

                            @if ($ticket->user)
                                <a href="mailto:{{ $ticket->user->email }}">
                                    {{ $ticket->user->email }}
                                </a>
                            @else
                                -
                            @endif

                        </div>

                    </div>

                    {{-- PHONE --}}
                    <div class="col-lg-4 mb-4">

                        <label class="ad-form-label">
                            Телефон
                        </label>

                        <div class="ad-form-control">

                            @if ($ticket->user?->phone)

                                <a href="tel:{{ $ticket->user->phone }}">
                                    {{ $ticket->user->phone }}
                                </a>

                            @else

                                Няма въведен телефон

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            {{-- TICKET INFORMATION --}}
            <div class="ad-form-card">

                <div class="heading two mb-4">

                    <h4>
                        <i class="fa-solid fa-headset me-2"></i>
                        Информация за заявката
                    </h4>

                </div>

                <div class="row">

                    {{-- TICKET ID --}}
                    <div class="col-lg-6 mb-4">

                        <label class="ad-form-label">
                            Номер на заявката
                        </label>

                        <div class="ad-form-control">
                            #{{ $ticket->id }}
                        </div>

                    </div>

                    {{-- CREATED AT --}}
                    <div class="col-lg-6 mb-4">

                        <label class="ad-form-label">
                            Дата на изпращане
                        </label>

                        <div class="ad-form-control">
                            {{ $ticket->created_at->format('d.m.Y H:i') }}
                        </div>

                    </div>

                    {{-- TITLE --}}
                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Заглавие
                        </label>

                        <div class="ad-form-control">
                            {{ $ticket->title }}
                        </div>

                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Описание
                        </label>

                        <div class="ad-form-control"
                             style="white-space: pre-wrap;">{{ $ticket->description }}</div>

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Прикачено изображение
                        </label>

                        @if ($ticket->image)

                            <div class="ad-upload-box">

                                <a href="{{ asset('assets/img/dashboard/support/' . $ticket->image) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   title="Отвори изображението в нов раздел">

                                    <img
                                        src="{{ asset('assets/img/dashboard/support/' . $ticket->image) }}"
                                        alt="Изображение към заявка #{{ $ticket->id }}"
                                        class="img-fluid rounded-3"
                                        style="max-height: 450px; object-fit: contain;"
                                    >

                                </a>

                                <p class="mt-3 mb-0 text-muted">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>
                                    Натиснете изображението, за да го отворите в нов раздел.
                                </p>

                            </div>

                        @else

                            <p class="text-muted">
                                Няма прикачено изображение.
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-backend>
