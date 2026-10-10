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
                    Оттук можете да преглеждате вашите Facebook лийдове
                    и да отбелязвате кои от тях са видяни.
                </p>
            </div>
        </div>

        <hr>

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
                    Преглеждайте получените запитвания от вашите Facebook форми.
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

                            </div>

                            {{-- Saved Form IDs - read only --}}
                            @if ($user->facebookForms->isNotEmpty())

                                <div class="lead-saved-forms">

                                    <span class="lead-saved-title">
                                        Form ID:
                                    </span>

                                    @foreach ($user->facebookForms as $facebookForm)

                                        <span class="lead-form-badge">
                                            {{ $facebookForm->form_id }}
                                        </span>

                                    @endforeach

                                </div>

                            @endif

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

                                                <tr>

                                                    {{-- Seen --}}
                                                    <td>

                                                        <input
                                                            type="checkbox"
                                                            class="lead-seen-checkbox"
                                                            value="{{ $lead->id }}"
                                                            data-url="{{ route('leads.update.seen', $lead->id) }}"
                                                            {{ $lead->is_seen ? 'checked' : '' }}
                                                        />
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


    <script>
        $(document).ready(function() {
            updateLeadSeenStatus();
        });


        function updateLeadSeenStatus() {

            $(document).on('change', '.lead-seen-checkbox', function() {

                const checkbox = $(this);

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
                        // console.log(response);
                    },

                    error: function(xhr) {
                        console.log(xhr);

                        checkbox.prop(
                            'checked',
                            !checkbox.is(':checked')
                        );
                    },

                    complete: function() {
                        checkbox.prop('disabled', false);
                    }
                });

            });

        }
    </script>

</x-backend>
