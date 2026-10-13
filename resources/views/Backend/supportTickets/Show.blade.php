
<x-backend>

    @section('SEO')
        <title>Заявка #{{ $ticket->id }}</title>
    @endsection

    <div class="profile-page">

        <div class="heading two">
            <h6>ПОДДРЪЖКА</h6>

            <h2>
                Заявка #{{ $ticket->id }}
            </h2>

            <p class="pt-lg-3 pt-md-2">
                Преглед на изпратената от вас заявка.
            </p>
        </div>

        <hr>

        <section class="profile-section mb-5">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <a href="{{ route('support-ticket.index') }}"
                   class="btn">
                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Назад към заявките
                </a>

                <span class="badge bg-secondary p-2">
                    Само за преглед
                </span>

            </div>

            <div class="ad-form-card">

                <div class="row">

                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Заглавие
                        </label>

                        <div class="ad-form-control">
                            {{ $ticket->title }}
                        </div>

                    </div>

                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Описание
                        </label>

                        <div class="ad-form-control"
                             style="white-space: pre-wrap;">{{ $ticket->description }}</div>

                    </div>

                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Изпратена на
                        </label>

                        <div class="ad-form-control">
                            {{ $ticket->created_at->format('d.m.Y H:i') }}
                        </div>

                    </div>

                    <div class="col-12 mb-4">

                        <label class="ad-form-label">
                            Прикачено изображение
                        </label>

                        <div class="ad-upload-box">

                            <img
                                src="/assets/img/dashboard/support/{{ $ticket->image }}"
                                alt="Изображение към заявката"
                                class="img-fluid rounded-3"
                                style="max-height: 450px; object-fit: contain;"
                            >

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-backend>
