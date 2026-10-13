
<x-backend>

    @section('SEO')
        <title>Моите заявки</title>
    @endsection

    <div class="profile-page">

        <div class="heading two">
            <h6>ПОДДРЪЖКА</h6>

            <h2>Моите заявки</h2>

            <p class="pt-lg-3 pt-md-2">
                Оттук можете да преглеждате всички
                заявки, които сте изпратили към нашия екип.
            </p>
        </div>

        <hr>

        <section class="profile-section mb-5">

            <div class="heading two mb-4">
                <h2>Заявки към поддръжката</h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо заявки:
                    <strong>{{ $tickets->total() }}</strong>
                </p>
            </div>

            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="lead-user-box shadow-sm rounded-3 mb-4 overflow-hidden">

                <div class="lead-user-content">

                    <div class="row">
                        <div class="col-12">

                            <div class="lead-toolbar">

                                <div>
                                    <h5 class="mb-1 mt-3">
                                        <i class="fa-solid fa-headset me-2"></i>
                                        Моите заявки
                                    </h5>

                                    <div class="text-muted small">
                                        Всички изпратени заявки към поддръжката
                                    </div>
                                </div>

                                @if ($canCreateTicket)
                                    <div>
                                        <a class="btn"
                                           href="{{ route('support-tickets.create') }}">
                                            <i class="fa-solid fa-plus me-2"></i>
                                            Нова заявка
                                        </a>
                                    </div>
                                @endif

                            </div>

                            @if ($tickets->isNotEmpty())

                                <div class="table-responsive lead-table-wrapper">

                                    <table class="table align-middle mb-0 lead-table">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Заглавие</th>
                                                <th>Описание</th>
                                                <th>Изображение</th>
                                                <th>Създадена на</th>
                                                <th>Преглед</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($tickets as $ticket)
                                                <tr>

                                                    <td>
                                                        <strong>
                                                            #{{ $ticket->id }}
                                                        </strong>
                                                    </td>

                                                    <td>
                                                        <strong>
                                                            {{ $ticket->title }}
                                                        </strong>
                                                    </td>

                                                    <td>
                                                        {{ \Illuminate\Support\Str::limit(
                                                            $ticket->description,
                                                            80
                                                        ) }}
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('support-tickets.show', $ticket) }}">
                                                            <i class="fa-regular fa-image me-1"></i>
                                                            Виж
                                                        </a>
                                                    </td>

                                                    <td>
                                                        {{ $ticket->created_at->format('d.m.Y H:i') }}
                                                    </td>

                                                    <td>
                                                        <a
                                                            href="{{ route('support-tickets.show', $ticket) }}"
                                                            class="btn btn-sm"
                                                        >
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

                                    <i class="fa-solid fa-headset"></i>

                                    <div>
                                        <strong>
                                            Все още нямате заявки
                                        </strong>

                                        <p class="mb-0">
                                            След като изпратите първата си
                                            заявка, тя ще се появи тук.
                                        </p>
                                    </div>

                                </div>

                            @endif

                            @if ($tickets->hasPages())
                                <div class="mt-4">
                                    {{ $tickets->links() }}
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>

</x-backend>
