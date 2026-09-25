<x-backend>

    @section('SEO')
        <title>Моите лийдове</title>
    @endsection

    <div class="profile-page">

        <div>
            <div class="heading two">
                <h6>FACEBOOK LEADS</h6>

                <h2>
                    Моите лийдове
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да управлявате вашите Facebook Lead форми
                    и получените лийдове.
                </p>
            </div>
        </div>

        <hr>


        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success w-fit rounded-pill">
                {{ session('success') }}
            </div>
        @endif


        {{-- Error message --}}
        @if (session('error'))
            <div class="alert alert-danger w-fit rounded-pill">
                {{ session('error') }}
            </div>
        @endif



        {{-- Integrate Facebook leads --}}
        <form method="POST" action="{{ route('leads.insert') }}">
            @csrf

            @foreach ($user->facebookForms as $facebookForm)
                <input
                    type="hidden"
                    name="form_ids[{{ $user->id }}][]"
                    value="{{ $facebookForm->form_id }}"
                >
            @endforeach


            @if ($user->facebookForms->isNotEmpty())
                <div class="d-flex justify-content-end mt-4 mb-4">

                    <button
                        type="submit"
                        class="btn btn-primary rounded-pill px-4"
                    >
                        <i class="fa-brands fa-facebook me-2"></i>

                        Интегрирай лийдовете
                    </button>

                </div>
            @endif

        </form>



        <section class="profile-section mb-5">

            <div class="heading two mb-4">

                <h6>
                    FACEBOOK LEAD FORMS
                </h6>

                <h2>
                    Лийдове
                </h2>

                <p class="pt-lg-3 pt-md-2">
                    Общо лийдове:
                    <strong>{{ $leads->total() }}</strong>
                </p>

                <p>
                    Добавяйте и управлявайте вашите Facebook Form ID-та
                    и преглеждайте получените запитвания.
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
                                        <i class="fa-solid fa-users me-2"></i>

                                        Лийдове
                                    </h5>

                                    <div class="text-muted small">
                                        Всички ваши Facebook лийдове
                                    </div>

                                </div>



                                <div class="d-flex flex-wrap align-items-center gap-2">


                                    {{-- Form filter --}}
                                    <select class="form-select lead-filter-select">

                                        <option value="">
                                            Всички форми
                                        </option>

                                        @foreach ($user->facebookForms as $facebookForm)

                                            <option value="{{ $facebookForm->form_id }}">
                                                {{ $facebookForm->form_id }}
                                            </option>

                                        @endforeach

                                    </select>



                                

                                </div>

                            </div>



                            {{-- Saved Form IDs --}}
                            <div
                                class="lead-saved-forms {{ $user->facebookForms->isEmpty() ? 'd-none' : '' }}"
                            >

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
                            @if ($leads->isNotEmpty())

                                <div class="table-responsive lead-table-wrapper">

                                    <table class="table align-middle mb-0 lead-table">

                                        <thead>

                                            <tr>

                                                <th>
                                                    Видяни
                                                </th>

                                                <th>
                                                    Име
                                                </th>

                                                <th>
                                                    Имейл
                                                </th>

                                                <th>
                                                    Телефон
                                                </th>

                                                <th>
                                                    Form ID
                                                </th>

                                                <th>
                                                    Въпроси
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @foreach ($leads as $lead)

                                                <tr
                                                    data-form-id="{{ $lead->leadForm?->form_id }}"
                                                >


                                                    {{-- Seen --}}
                                                    <td>

                                                        <input
                                                            type="checkbox"
                                                            class="lead-seen-checkbox"
                                                            value="{{ $lead->id }}"
                                                            data-url="{{ route('leads.update.seen', $lead->id) }}"
                                                            {{ $lead->is_seen ? 'checked' : '' }}
                                                        >

                                                    </td>



                                                    {{-- Name --}}
                                                    <td>

                                                        <strong>
                                                            {{ $lead->full_name ?? '-' }}
                                                        </strong>

                                                    </td>



                                                    {{-- Email --}}
                                                    <td>
                                                        {{ $lead->email ?? '-' }}
                                                    </td>



                                                    {{-- Phone --}}
                                                    <td>
                                                        {{ $lead->phone ?? '-' }}
                                                    </td>



                                                    {{-- Form ID --}}
                                                    <td>

                                                        <span class="lead-form-badge">

                                                            {{ $lead->leadForm?->form_id ?? '-' }}

                                                        </span>

                                                    </td>



                                                    {{-- Questions --}}
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



                            {{-- Pagination --}}
                            @if ($leads->hasPages())

                                <div class="mt-4">

                                    {{ $leads->links() }}

                                </div>

                            @endif


                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>



    {{-- Delete Facebook Form modal --}}
    <div
        class="modal fade"
        id="deleteFacebookFormModal"
        tabindex="-1"
        aria-hidden="true"
    >

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

                        <button
                            type="button"
                            class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal"
                        >
                            Отказ
                        </button>


                        <button
                            type="button"
                            class="btn btn-danger rounded-pill px-4"
                            id="confirmDeleteFacebookForm"
                        >
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
                const container = $('.lead-saved-forms');
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


                        input.val('');

                        const newChip = container
                            .find('.lead-form-chip')
                            .last();


                        const formId = newChip
                            .find('span')
                            .first()
                            .text()
                            .trim();


                        if (formId) {

                            $('.lead-filter-select').append(

                                $('<option>', {
                                    value: formId,
                                    text: formId
                                })

                            );

                        }

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
            let formIdToDelete = null;

            const modalElement = document.getElementById(
                'deleteFacebookFormModal'
            );

            const deleteModal = new bootstrap.Modal(
                modalElement
            );

            $(document).on('submit', '.delete-form-id-form', function(e) {

                e.preventDefault();

                formToDelete = $(this);

                chipToDelete = formToDelete.closest(
                    '.lead-form-chip'
                );

                containerToUpdate = formToDelete.closest(
                    '.lead-saved-forms'
                );


                formIdToDelete = chipToDelete
                    .find('span')
                    .first()
                    .text()
                    .trim();


                $('#deleteFacebookFormValue')
                    .text(formIdToDelete);

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

                        if (chipCount === 0) {

                            containerToUpdate.addClass('d-none');

                        }

                        $('.lead-filter-select option')
                            .filter(function() {

                                return $(this).val() === formIdToDelete;

                            })
                            .remove();



                        deleteModal.hide();

                        formToDelete = null;
                        chipToDelete = null;
                        containerToUpdate = null;
                        formIdToDelete = null;

                    },


                    error: function(xhr) {

                        console.log(xhr.responseJSON);


                        alert(
                            'Възникна грешка при изтриването.'
                        );

                    },


                    complete: function() {

                        confirmButton.prop(
                            'disabled',
                            false
                        );

                    }

                });

            });

        }

        function filterFacebookLeads() {

            $('.lead-filter-select').on('change', function() {


                const selectedFormId = $(this).val();


                $('.lead-table tbody tr').each(function() {


                    const lead = $(this);

                    const leadFormId = lead.data('form-id').toString();


                    if (
                        selectedFormId === '' ||
                        leadFormId === selectedFormId
                    ) {

                        lead.show();

                    } else {

                        lead.hide();

                    }

                });

            });

        }


        function updateLeadSeenStatus() {

            $(document).on(
                'change',
                '.lead-seen-checkbox',
                function() {


                const checkbox = $(this);

                const url = checkbox.data('url');

                const isSeen = checkbox.is(':checked')? 1: 0;


                checkbox.prop('disabled', true);



                $.ajax({

                    url: url,
                    type: 'PATCH',

                    data: {

                        _token: $(
                            'meta[name="csrf-token"]'
                        ).attr('content'),

                        is_seen: isSeen

                    },


                    success: function(response) {

                        console.log(response);

                    },


                    error: function(xhr) {

                        console.log(xhr);
                        checkbox.prop(
                            'checked',
                            !checkbox.is(':checked')
                        );

                    },


                    complete: function() {

                        checkbox.prop(
                            'disabled',
                            false
                        );

                    }

                });

            });

        }

    </script>

</x-backend>
