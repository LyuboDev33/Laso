<x-backend>

    @section('SEO')
        <title>Админ | Лийдове</title>
    @endsection

    <div class="profile-page">

        <div>
            <div class="heading two">
                <h6>АДМИНИСТРАЦИЯ</h6>
                <h2>Лийдове</h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да менажирате потребителите, техните Facebook Lead форми и лийдове.
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

        <form method="POST" action="{{ route('leads.insert') }}">
            @csrf

            @foreach ($users as $user)
                @foreach ($user->facebookForms as $facebookForm)
                    <input type="hidden" name="form_ids[{{ $user->id }}][]" value="{{ $facebookForm->form_id }}">
                @endforeach
            @endforeach

            @if ($users->isNotEmpty())
                <div class="d-flex justify-content-end mt-4 mb-4">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fa-brands fa-facebook me-2"></i>
                        Интегрирай лийдовете
                    </button>
                </div>
            @endif
        </form>

        <section class="profile-section mb-5">

            <div class="heading two mb-4">
                <h6>ВСИЧКИ ПОТРЕБИТЕЛИ</h6>
                <h2>Facebook Lead Forms</h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо регистрирани потребители:
                    <strong>{{ $users->total() }}</strong>
                </p>

                <p>
                    Добавяйте и управлявайте Facebook Form ID-тата на всеки потребител.
                    Отворете секцията с лийдове, за да видите получените запитвания.
                </p>
            </div>

            <div class="table-responsive">

                <table class="table align-middle leads-admin-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Име</th>
                            <th>Имейл</th>
                            <th>Добави Facebook Form ID</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>
                                <td>#{{ $user->id }}</td>

                                <td>
                                    <strong>{{ $user->name }}</strong>
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    <form method="POST" action="{{ route('leads.add.formId', $user) }}" id="add-form-{{ $user->id }}">
                                        @csrf

                                        <input
                                            type="text"
                                            name="form_id"
                                            class="form-control"
                                            placeholder="Въведете Facebook Form ID"
                                            autocomplete="off"
                                        >
                                    </form>
                                </td>

                                <td>
                                    <button type="submit" form="add-form-{{ $user->id }}" class="btn btn-primary rounded-pill">
                                        Добави Form ID
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">

                                    <div class="py-2">

                                        <strong class="d-block mb-3">
                                            Запазени Facebook Form ID
                                        </strong>

                                        @forelse ($user->facebookForms as $facebookForm)

                                            <div class="d-flex align-items-center gap-2 mb-2">

                                                <form method="POST" action="{{ route('leads.update.formId', $facebookForm) }}" class="d-flex align-items-center gap-2 flex-grow-1">
                                                    @csrf
                                                    @method('PATCH')

                                                    <input
                                                        type="text"
                                                        name="form_id"
                                                        class="form-control"
                                                        value="{{ $facebookForm->form_id }}"
                                                        autocomplete="off"
                                                    >

                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa-solid fa-floppy-disk"></i>
                                                        Обнови
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('leads.delete.formId', $facebookForm) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Изтрий
                                                    </button>
                                                </form>

                                            </div>

                                        @empty

                                            <div class="alert alert-light mb-0">
                                                Няма добавени Facebook Form ID-та.
                                            </div>

                                        @endforelse

                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">

                                    <details class="w-100">

                                        <summary class="d-flex align-items-center justify-content-between py-3" style="cursor: pointer;">
                                            <strong>
                                                <i class="fa-solid fa-users me-2"></i>
                                                Лийдове на {{ $user->name }}
                                            </strong>

                                            <span class="badge bg-primary rounded-pill">
                                                {{ $user->leads->count() }}
                                            </span>
                                        </summary>

                                        <div class="pt-3 pb-4">

                                            @if ($user->leads->isNotEmpty())

                                                <div class="table-responsive">

                                                    <table class="table table-bordered align-middle mb-0">

                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Име</th>
                                                                <th>Имейл</th>
                                                                <th>Телефон</th>
                                                                <th>Form ID</th>
                                                                <th>Ad ID</th>
                                                                <th>Въпроси</th>
                                                                <th>Дата</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                            @foreach ($user->leads as $lead)

                                                                <tr>
                                                                    <td>
                                                                        #{{ $lead->id }}
                                                                    </td>

                                                                    <td>
                                                                        <strong>
                                                                            {{ $lead->full_name ?? '-' }}
                                                                        </strong>
                                                                    </td>

                                                                    <td>
                                                                        {{ $lead->email ?? '-' }}
                                                                    </td>

                                                                    <td>
                                                                        {{ $lead->phone ?? '-' }}
                                                                    </td>

                                                                    <td>
                                                                        {{ $lead->facebook_form_id }}
                                                                    </td>

                                                                    <td>
                                                                        {{ $lead->facebook_ad_id ?? '-' }}
                                                                    </td>

                                                                    <td>

                                                                        @if (!empty($lead->questions))

                                                                            @foreach ($lead->questions as $question => $answer)

                                                                                <div class="mb-2">
                                                                                    <strong>
                                                                                        {{ str_replace('_', ' ', $question) }}
                                                                                    </strong>

                                                                                    <div>
                                                                                        {{ is_array($answer) ? implode(', ', $answer) : $answer }}
                                                                                    </div>
                                                                                </div>

                                                                            @endforeach

                                                                        @else

                                                                            <span class="text-muted">
                                                                                Няма допълнителни въпроси
                                                                            </span>

                                                                        @endif

                                                                    </td>

                                                                    <td>
                                                                        {{ $lead->facebook_created_at?->format('d.m.Y H:i') ?? '-' }}
                                                                    </td>
                                                                </tr>

                                                            @endforeach

                                                        </tbody>

                                                    </table>

                                                </div>

                                            @else

                                                <div class="alert alert-info mb-0">
                                                    Все още няма интегрирани лийдове за този потребител.
                                                </div>

                                            @endif

                                        </div>

                                    </details>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">

                                    <div class="alert alert-info mb-0">
                                        Все още няма регистрирани потребители.
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
