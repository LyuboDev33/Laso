<x-backend>

    @section('SEO')
        <title>Админ | Потребители</title>
    @endsection

    <div class="profile-page">

        <div>
            <div class="heading two">
                <h6>АДМИНИСТРАЦИЯ</h6>
                <h2>Потребители</h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да преглеждате всички регистрирани потребители в системата, както и статуса на техния
                    абонамент.
                </p>
            </div>
        </div>

        <hr>

        @if (session('success'))
            <div class="alert alert-success w-fit rounded-pill">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger w-fit rounded-pill">
                {{ session('error') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3 mb-4 align-items-end">

            <div class="col-md-4">
                <label for="ended_date" class="form-label">
                    Дата на изтичане на абонамента
                </label>

                <input type="date" id="ended_date" name="ended_date" class="form-control"
                    value="{{ $endedDate ?? '' }}">
            </div>

            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary">
                    Филтрирай
                </button>
            </div>

            <div class="col-md-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    Изчисти филтъра
                </a>
            </div>

        </form>

        <section class="profile-section mb-5">

            <div class="heading two mb-4">
                <h6>ВСИЧКИ ПОТРЕБИТЕЛИ</h6>
                <h2>Списък с потребители</h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо регистрирани потребители: <strong>{{ $users->total() }}</strong>
                </p>
            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Име</th>
                            <th>Имейл</th>
                            <th>Абонамент</th>
                            <th class="text-end">Действия</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)
                            <tr>

                                <td>
                                    #{{ $user->id }}
                                </td>

                                <td>
                                    <strong>{{ $user->name }}</strong>
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>



                                <td>
                                    @php
                                        $subscription = $getRelevantSubscription($user);
                                    @endphp

                                    @if ($subscription?->onGracePeriod())
                                        <span class="badge bg-warning text-dark p-2 w-fit">
                                            Абонаментът се прекратява
                                        </span>

                                        <div class="small text-muted mt-1">
                                            Активен до:
                                            {{ $subscription->ends_at->format('d.m.Y') }}
                                        </div>
                                    @elseif ($subscription?->active())
                                        <span class="badge bg-success p-2">
                                            Има активен абонамент
                                        </span>
                                    @elseif ($subscription?->ended())
                                        <span class="badge bg-danger p-2 mb-0 w-fit">
                                            Прекратен абонамент
                                        </span>

                                        @if ($subscription->ends_at)
                                            <div class="small text-muted mt-1">
                                                Изтекъл на:
                                                {{ $subscription->ends_at->format('d.m.Y') }}
                                            </div>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary p-2">
                                            Няма активен абонамент
                                        </span>
                                    @endif
                                </td>


                                <td class="text-end d-flex justify-content-end">

                                    <div class="d-flex flex-column gap-2 flex-xxl-row">
                                        <a href="{{ route('admin.users.ads', $user) }}" class="btn-custom-materials">
                                            Виж рекламите
                                        </a>

                                        <a href="{{ route('admin.users.show', $user) }}" class="btn">
                                            Разгледай
                                        </a>
                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="alert alert-info mb-0">
                                        Няма намерени потребители.
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            @if ($users->hasPages())
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            @endif

        </section>

    </div>

</x-backend>
