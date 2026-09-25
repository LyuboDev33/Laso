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

            @forelse ($users as $user)

                <details class="lead-user-box shadow-sm rounded-3 mb-4 overflow-hidden">

                    {{-- Clickable user header --}}
                    <summary class="lead-user-summary">

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 w-100">

                            <div class="d-flex align-items-center gap-3">

                                <div class="lead-user-avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div>
                                    <h4 class="mb-1">
                                        {{ $user->name }}
                                    </h4>

                                    <div class="text-muted small">
                                        {{ $user->email }}
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex align-items-center gap-2">

                                <span class="badge rounded-pill bg-primary px-3 py-2">
                                    {{ $user->leads->count() }} лийда
                                </span>

                                <span class="badge rounded-pill bg-dark px-3 py-2 formCount">
                                    {{ $user->facebookForms->count() }} Form ID
                                </span>

                                <span class="lead-user-chevron">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>

                            </div>

                        </div>

                    </summary>

                    {{-- User content --}}
                    <div class="lead-user-content">

                        <div class="row">

                            <div class="col-12">

                                {{-- Top controls --}}
                                <div class="lead-toolbar">

                                    <div>

                                        <h5 class="mb-1">
                                            <i class="fa-solid fa-users me-2"></i>
                                            Лийдове
                                        </h5>

                                        <div class="text-muted small">
                                            Всички Facebook лийдове на {{ $user->name }}
                                        </div>

                                    </div>

                                    <div class="d-flex flex-wrap align-items-center gap-2">

                                        {{-- Form filter --}}
                                        <select class="form-select lead-filter-select"
                                            data-user-id="{{ $user->id }}">
                                            <option value="">
                                                Всички форми
                                            </option>

                                            @foreach ($user->facebookForms as $facebookForm)
                                                <option value="{{ $facebookForm->form_id }}">
                                                    {{ $facebookForm->form_id }}
                                                </option>
                                            @endforeach

                                        </select>

                                        {{-- Add Form ID --}}
                                        <form method="POST" action="{{ route('leads.add.formId', $user) }}"
                                            class="d-flex align-items-center gap-2 add-form-id-form">
                                            @csrf

                                            <input type="text" name="form_id" class="form-control lead-form-input"
                                                placeholder="Facebook Form ID" autocomplete="off">

                                            <button type="submit" class="btn btn-primary rounded-pill text-nowrap">
                                                <i class="fa-solid fa-plus me-1"></i>
                                                Добави
                                            </button>

                                        </form>

                                    </div>

                                </div>

                                {{-- Saved form IDs --}}
                                <div class="lead-saved-forms {{ $user->facebookForms->isEmpty() ? 'd-none' : '' }}"
                                    data-user-id="{{ $user->id }}">

                                    <span class="lead-saved-title">
                                        Form ID:
                                    </span>

                                    @foreach ($user->facebookForms as $facebookForm)
                                        @include('admin.Leads.partials.form-chip', [
                                            'facebookForm' => $facebookForm,
                                        ])
                                    @endforeach

                                </div>


                                {{-- Leads table --}}
                                @if ($user->leads->isNotEmpty())
                                    <div class="table-responsive lead-table-wrapper">

                                        <table class="table align-middle mb-0 lead-table">

                                            <thead>
                                                <tr>
                                                    <th>Видяни</th>
                                                    <th>Име</th>
                                                    <th>Имейл</th>
                                                    <th>Телефон</th>
                                                    <th>Form ID</th>
                                                    <th>Въпроси</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($user->leads as $lead)
                                                    <tr data-form-id="{{ $lead->leadForm?->form_id }}"
                                                        data-user-id="{{ $user->id }}">

                                                        <td>
                                                            <input type="checkbox" class="lead-seen-checkbox"
                                                                disabled
                                                                value="{{ $lead->id }}"
                                                                data-url="{{ route('leads.update.seen', $lead->id) }}"
                                                                {{ $lead->is_seen ? 'checked' : '' }}>
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
                                                            <span class="lead-form-badge">
                                                                {{ $lead->leadForm?->form_id ?? '-' }}
                                                            </span>
                                                        </td>

                                                        <td class="lead-questions-cell">

                                                            @if (!empty($lead->questions))
                                                                @foreach ($lead->questions as $question => $answer)
                                                                    <div class="lead-question-item">

                                                                        <strong>
                                                                            {{ ucfirst(str_replace('_', ' ', $question)) }}
                                                                        </strong>

                                                                        <span>
                                                                            {{ is_array($answer)
                                                                                ? ucfirst(str_replace('_', ' ', implode(', ', $answer)))
                                                                                : ucfirst(str_replace('_', ' ', $answer)) }}
                                                                        </span>

                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <span class="text-muted">
                                                                    Няма допълнителни въпроси
                                                                </span>
                                                            @endif

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>
                                @else
                                    <div class="lead-empty-state">

                                        <i class="fa-solid fa-inbox"></i>

                                        <div>

                                            <strong>
                                                Все още няма лийдове
                                            </strong>

                                            <p class="mb-0">
                                                След интеграция лийдовете ще се появят тук.
                                            </p>

                                        </div>

                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>

                </details>

                <hr>

            @empty

                <div class="alert alert-info">
                    Все още няма регистрирани потребители.
                </div>

            @endforelse


            @if ($users->hasPages())
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            @endif

        </section>

    </div>


    <div class="modal fade" id="deleteFacebookFormModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-delete-modal">

                <div class="modal-body p-4 p-md-5 text-center">

                    <div class="delete-modal-icon mb-4">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>

                    <h4 class="mb-3">
                        Изтриване на Form ID
                    </h4>

                    <p class="text-muted mb-4">
                        Сигурни ли сте, че искате да изтриете това Form ID?
                    </p>

                    <div class="delete-form-preview mb-4">
                        <span class="text-muted small d-block mb-1">
                            Form ID
                        </span>

                        <strong id="deleteFacebookFormValue"></strong>
                    </div>

                    <div class="d-flex justify-content-center gap-2">

                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">
                            Отказ
                        </button>

                        <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmDeleteFacebookForm">
                            <i class="fa-solid fa-trash-can me-2"></i>
                            Изтрий
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            insertFacebookFormId();
            deleteFacebookFormId();
            filterFacebookLeads();
            updateLeadSeenStatus();

        });


        function insertFacebookFormId() {
            $(document).on('submit', '.add-form-id-form', function(e) {
                e.preventDefault();

                const form = $(this);
                const userBox = form.closest('.lead-user-content');
                const container = userBox.find('.lead-saved-forms');
                const input = form.find('input[name="form_id"]');
                const button = form.find('button[type="submit"]');

                button.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),

                    success: function(response) {
                        container.removeClass('d-none');
                        container.append(response.html);

                        let chipCount = container.find('.lead-form-chip').length;

                        container
                            .closest('.lead-user-box')
                            .find('.formCount')
                            .text(chipCount + ' Form ID');

                        input.val('');
                    },

                    error: function(xhr) {
                        if (xhr.status === 422) {
                            alert(
                                xhr.responseJSON.errors?.form_id?.[0] ??
                                'Невалиден Form ID.'
                            );

                            return;
                        }

                        alert('Възникна грешка при добавянето.');
                    },

                    complete: function() {
                        button.prop('disabled', false);
                    }
                });
            });
        }


        function deleteFacebookFormId() {

            let formToDelete = null;
            let chipToDelete = null;
            let containerToUpdate = null;

            const modalElement = document.getElementById('deleteFacebookFormModal');
            const deleteModal = new bootstrap.Modal(modalElement);

            $(document).on('submit', '.delete-form-id-form', function(e) {
                e.preventDefault();

                formToDelete = $(this);
                chipToDelete = formToDelete.closest('.lead-form-chip');
                containerToUpdate = formToDelete.closest('.lead-saved-forms');

                const formIdValue = chipToDelete
                    .find('span')
                    .first()
                    .text()
                    .trim();

                $('#deleteFacebookFormValue').text(formIdValue);

                deleteModal.show();
            });


            $('#confirmDeleteFacebookForm').on('click', function() {

                if (!formToDelete) {
                    return;
                }

                const confirmButton = $(this);

                confirmButton.prop('disabled', true);

                $.ajax({
                    url: formToDelete.attr('action'),
                    type: 'POST',
                    data: formToDelete.serialize(),

                    success: function(response) {

                        chipToDelete.remove();

                        const chipCount = containerToUpdate
                            .find('.lead-form-chip')
                            .length;

                        containerToUpdate
                            .closest('.lead-user-box')
                            .find('.formCount')
                            .text(chipCount + ' Form ID');

                        if (chipCount === 0) {
                            containerToUpdate.addClass('d-none');
                        }

                        deleteModal.hide();

                        formToDelete = null;
                        chipToDelete = null;
                        containerToUpdate = null;
                    },

                    error: function(xhr) {
                        console.log(xhr.responseJSON);

                        alert('Възникна грешка при изтриването.');
                    },

                    complete: function() {
                        confirmButton.prop('disabled', false);
                    }
                });
            });
        }

        function filterFacebookLeads() {

            const filters = document.querySelectorAll('.lead-filter-select');

            filters.forEach(filter => {

                filter.addEventListener('change', function() {

                    const selectedFormId = this.value;
                    const userId = this.dataset.userId;

                    const leads = document.querySelectorAll(
                        `.lead-table tbody tr[data-user-id="${userId}"]`
                    );

                    leads.forEach(lead => {

                        const leadFormId = lead.dataset.formId;


                        if (selectedFormId === '' || leadFormId === selectedFormId) {
                            lead.style.display = '';
                        } else {
                            lead.style.display = 'none';
                        }

                    });

                });

            });

        }

        function updateLeadSeenStatus() {

            $(document).on('change', '.lead-seen-checkbox', function() {

                const checkbox = $(this);

                const leadId = checkbox.val();
                const url = checkbox.data('url');
                const isSeen = checkbox.is(':checked') ? 1 : 0;

                checkbox.prop('disabled', true);

                $.ajax({
                    url: url,
                    type: 'PATCH',

                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        is_seen: isSeen
                    },

                    success: function(response) {
                        console.log(response);
                    },

                    error: function(xhr) {
                        console.log(xhr);

                        checkbox.prop('checked', !checkbox.is(':checked'));
                    },

                    complete: function() {
                        checkbox.prop('disabled', false);
                    }
                });

            });

        }
    </script>

</x-backend>
