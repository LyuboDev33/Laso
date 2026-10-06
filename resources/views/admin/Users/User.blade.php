<x-backend>

    {{-- SEO --}}
    <x-slot:seo>
        <title>Реклами на {{ $user->name }} | LASO</title>
        <meta
            name="description"
            content="Преглед на рекламите на {{ $user->name }}"
        >
    </x-slot:seo>


    {{-- Page Heading --}}
    <div class="page-heading">

        <div>
            <h1>
                Реклами на {{ $user->name }}
            </h1>

            <p class="mb-0">
                Преглед на всички реклами, създадени от потребителя.
            </p>
        </div>

        <a
            href="{{ route('admin.users.index') }}"
            class="btn mt-2 mb-2"
        >
            <i class="fa-solid fa-arrow-left me-2"></i>
            Назад към потребителите
        </a>

    </div>


    {{-- User information --}}
    <div class="card mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">

                    <small class="text-muted d-block mb-1">
                        Потребител
                    </small>

                    <strong>
                        {{ $user->name }}
                    </strong>

                </div>


                <div class="col-md-4 mb-3 mb-md-0">

                    <small class="text-muted d-block mb-1">
                        Имейл
                    </small>

                    <span>
                        {{ $user->email }}
                    </span>

                </div>


                <div class="col-md-4">

                    <small class="text-muted d-block mb-1">
                        Общо реклами
                    </small>

                    <strong>
                        {{ $ads->total() }}
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- Ads --}}
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Компания
                            </th>

                            <th>
                                Град
                            </th>

                            <th>
                                Телефон
                            </th>

                            <th>
                                Уебсайт
                            </th>

                            <th>
                                Дата
                            </th>

                            <th class="text-end">
                                Действия
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($ads as $ad)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    #{{ $ad->id }}
                                </td>


                                {{-- Company --}}
                                <td>

                                    <strong>
                                        {{ $ad->company_name }}
                                    </strong>

                                </td>


                                {{-- City --}}
                                <td>
                                    {{ $ad->city }}
                                </td>


                                {{-- Phone --}}
                                <td>
                                    {{ $ad->phone }}
                                </td>


                                {{-- Website --}}
                                <td>

                                    @if ($ad->website)

                                        <a
                                            href="{{ $ad->website }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            {{ $ad->website }}
                                        </a>

                                    @else

                                        <span class="text-muted">
                                            Няма
                                        </span>

                                    @endif

                                </td>


                                {{-- Created --}}
                                <td>

                                    {{ $ad->created_at->format('d.m.Y H:i') }}

                                </td>


                                {{-- Actions --}}
                                <td class="text-end">

                                    <a
                                        href="{{ route('admin.users.details.show', [
                                            'user' => $user,
                                            'ad' => $ad,
                                        ]) }}"
                                        class="btn"
                                    >
                                        <i class="fa-solid fa-eye me-1"></i>
                                        Разгледай рекламата
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5"
                                >

                                    <div class="alert alert-info mb-0">

                                        Този потребител все още няма създадени реклами.

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if ($ads->hasPages())

                <div class="mt-4">

                    {{ $ads->links() }}

                </div>

            @endif

        </div>

    </div>

</x-backend>
