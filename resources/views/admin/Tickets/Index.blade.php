<x-backend>

    @section('SEO')
        <title>Админ | Заявки към поддръжката</title>
    @endsection

    <div class="profile-page">

        {{-- PAGE HEADING --}}
        <div>

            <div class="heading two">

                <h6>
                    АДМИНИСТРАЦИЯ
                </h6>

                <h2>
                    Заявки към поддръжката
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да преглеждате всички заявки,
                    изпратени от потребителите към нашия екип.
                </p>

            </div>

        </div>

        <hr>

        <section class="profile-section mb-5">

            <div class="heading two mb-4">

                <h6>
                    ВСИЧКИ ЗАЯВКИ
                </h6>

                <h2>
                    Списък със заявки
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо заявки:
                    <strong>{{ $tickets->total() }}</strong>
                </p>

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Заглавие</th>
                            <th>Потребител</th>
                            <th>Имейл</th>
                            <th>Телефон</th>
                            <th>Изпратена на</th>
                            <th class="text-end">Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($tickets as $ticket)

                            <tr>

                                {{-- TICKET ID --}}
                                <td>
                                    <strong>
                                        #{{ $ticket->id }}
                                    </strong>
                                </td>

                                {{-- TITLE --}}
                                <td>
                                    <strong>
                                        {{ $ticket->title }}
                                    </strong>
                                </td>

                                {{-- USER NAME --}}
                                <td>
                                    @if ($ticket->user)
                                        <strong>
                                            {{ $ticket->user->name }}
                                        </strong>
                                    @else
                                        <span class="text-muted">
                                            Изтрит потребител
                                        </span>
                                    @endif
                                </td>

                                {{-- EMAIL --}}
                                <td>
                                    @if ($ticket->user)
                                        <a href="mailto:{{ $ticket->user->email }}">
                                            {{ $ticket->user->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                {{-- PHONE --}}
                                <td>
                                    @if ($ticket->user?->phone)
                                        <a href="tel:{{ $ticket->user->phone }}">
                                            {{ $ticket->user->phone }}
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            Няма телефон
                                        </span>
                                    @endif
                                </td>

                                {{-- CREATED AT --}}
                                <td>
                                    {{ $ticket->created_at->format('d.m.Y H:i') }}
                                </td>

                                {{-- ACTIONS --}}
                                <td class="text-end">

                                    <div class="d-flex flex-column gap-2 flex-xxl-row justify-content-end">

                                        @if ($ticket->user)

                                            <a href="{{ route('admin.users.show', $ticket->user) }}"
                                               class="btn">
                                                Потребител / План
                                            </a>

                                        @endif

                                        <a href="{{ route('admin.support-tickets.show', $ticket) }}"
                                           class="btn">
                                            <i class="fa-solid fa-eye me-1"></i>
                                            Преглед на Ticket
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">

                                    <div class="alert alert-info mb-0">
                                        Все още няма изпратени заявки към поддръжката.
                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            @if ($tickets->hasPages())

                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>

            @endif

        </section>

    </div>

</x-backend>
