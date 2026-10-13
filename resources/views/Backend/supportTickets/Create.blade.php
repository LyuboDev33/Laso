
<x-backend>

    @section('SEO')
        <title>Нова заявка към поддръжката</title>
    @endsection

    <div class="profile-page">

        <div class="heading two">
            <h6>ПОДДРЪЖКА</h6>

            <h2>Нова заявка</h2>

            <p class="pt-lg-3 pt-md-2">
                Опишете проблема или въпроса си и
                нашият екип ще разгледа вашата заявка.
            </p>
        </div>

        <hr>

        <section class="profile-section mb-5">

            @if (!$canCreateTicket)

                <div class="ad-limit-box">

                    <div class="ad-limit-icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                    <div>
                        <h4>
                            Нямате налични заявки към поддръжката
                        </h4>

                        <p>
                            Вашият абонаментен план позволява
                            създаването на
                            <strong>{{ $ticketLimit }}</strong>
                            заявки.
                        </p>

                        <p class="mb-0">
                            В момента имате
                            <strong>{{ $ticketsCount }}</strong>
                            създадени заявки.
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('support-ticket.index') }}"
                               class="btn">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Моите заявки
                            </a>
                        </div>
                    </div>

                </div>

            @else

                <div class="ad-availability-box mb-4">

                    <div>
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Вашият план позволява
                        <strong>{{ $ticketLimit }}</strong>
                        заявки към поддръжката.
                    </div>

                    <div>
                        Остават ви:
                        <strong>{{ $availableTickets }}</strong>
                    </div>

                </div>

                <div class="ad-form-card">

                    <form
                        action="{{ route('support-tickets.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="content-form"
                    >
                        @csrf

                        <div class="row">

                            <div class="col-12 mb-4">
                                <label for="title"
                                       class="ad-form-label">
                                    Заглавие на заявката *
                                </label>

                                <input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="ad-form-control"
                                    maxlength="255"
                                    value="{{ old('title') }}"
                                    placeholder="Пример: Проблем с рекламната кампания"
                                    required
                                >

                                @error('title')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label for="description"
                                       class="ad-form-label">
                                    Описание на проблема *
                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    class="ad-form-control"
                                    rows="6"
                                    maxlength="255"
                                    placeholder="Опишете подробно вашия въпрос или проблем..."
                                    required
                                >{{ old('description') }}</textarea>

                                <p class="ad-field-description">
                                    Максимум 255 символа.
                                </p>

                                @error('description')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">

                                <div class="ad-upload-box">

                                    <label for="image"
                                           class="ad-form-label">
                                        <i class="fa-regular fa-image me-2"></i>
                                        Изображение *
                                    </label>

                                    <input
                                        id="image"
                                        name="image"
                                        type="file"
                                        class="ad-file-input"
                                        accept="image/jpeg,image/png,image/webp"
                                        required
                                    >

                                    <p>
                                        Прикачете изображение или екранна
                                        снимка, свързана с вашата заявка.
                                        Максимален размер: 5 MB.
                                    </p>

                                </div>

                                @error('image')
                                    <div class="ad-form-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <div class="ad-info-box">
                            <i class="fa-solid fa-circle-info"></i>

                            <div>
                                <strong>
                                    Какво следва?
                                </strong>

                                <p>
                                    След изпращането нашият екип ще
                                    разгледа вашата заявка.
                                    Можете да я прегледате по всяко време
                                    в секцията „Моите заявки“.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn">
                                <i class="fa-solid fa-paper-plane me-2"></i>
                                Изпрати заявката
                            </button>
                        </div>

                    </form>

                </div>

            @endif

        </section>

    </div>

</x-backend>
