
<x-backend>

    @section('SEO')
        <title>Админ | Материали на {{ $user->name }}</title>
    @endsection

    <div class="profile-page">

        <div>
            <div class="heading two">

                <h6>АДМИНИСТРАЦИЯ</h6>

                <h2>Материали на {{ $user->name }}</h2>

                <p class="pt-lg-3 pt-md-2">
                    Оттук можете да прегледате информацията и материалите,
                    предоставени от потребителя за подготовката на рекламната кампания.
                </p>

                {{-- AD LINK --}}
                @if ($details)
                    <form
                        action="{{ route('admin.users.ads.link.update', [
                            'user' => $user,
                            'ad' => $details,
                        ]) }}"
                        method="POST"
                        class="mt-4"
                    >
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">

                            <label for="ad_link" class="form-label">
                                Линк към готовата реклама
                            </label>

                            <input
                                type="url"
                                name="ad_link"
                                id="ad_link"
                                class="form-control"
                                placeholder="https://..."
                                value="{{ old('ad_link', $details->ad_link) }}"
                            >

                            @error('ad_link')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <button type="submit" class="btn">

                            <i class="fa-solid fa-link me-2"></i>

                            @if ($details->ad_link)
                                Обнови линка
                            @else
                                Добави линк
                            @endif

                        </button>

                    </form>
                @endif

                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <div class="alert alert-success mt-3 mb-0">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ERROR MESSAGE --}}
                @if (session('error'))
                    <div class="alert alert-danger mt-3 mb-0">
                        {{ session('error') }}
                    </div>
                @endif

            </div>
        </div>

        <hr>

        <section class="profile-section mb-5">

            <div class="heading two mb-4">
                <h6>ПОТРЕБИТЕЛ</h6>
                <h2>Основна информация</h2>
            </div>

            <div class="user-details-grid mb-5">

                {{-- USER ID --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Потребител #
                    </p>

                    <p class="user-details-value">
                        #{{ $user->id }}
                    </p>

                </div>

                {{-- NAME --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Име
                    </p>

                    <p class="user-details-value">
                        {{ $user->name }}
                    </p>

                </div>

                {{-- EMAIL --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Имейл
                    </p>

                    <p class="user-details-value">

                        <a
                            href="mailto:{{ $user->email }}"
                            class="user-details-link"
                        >
                            {{ $user->email }}
                        </a>

                    </p>

                </div>

                {{-- PHONE --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Телефон
                    </p>

                    <p class="user-details-value">

                        @if ($details?->phone)

                            <a
                                href="tel:{{ $details->phone }}"
                                class="user-details-link"
                            >
                                {{ $details->phone }}
                            </a>

                        @else

                            <span class="user-details-empty">
                                Не е добавен
                            </span>

                        @endif

                    </p>

                </div>

                {{-- FACEBOOK --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Facebook страница
                    </p>

                    <p class="user-details-value">

                        @if ($user->facebook_page)

                            <a
                                href="{{ $user->facebook_page }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="user-details-link"
                            >
                                Отвори Facebook страницата
                            </a>

                        @else

                            <span class="user-details-empty">
                                Не е добавена
                            </span>

                        @endif

                    </p>

                </div>

                {{-- MATERIALS STATUS --}}
                <div class="user-details-card">

                    <p class="user-details-label">
                        Материали
                    </p>

                    @if ($details)

                        <span class="user-details-status completed">
                            ✓ Материалите са изпратени
                        </span>

                    @else

                        <span class="user-details-status missing">
                            Все още няма материали
                        </span>

                    @endif

                </div>

            </div>

            <div class="heading two mb-4">
                <h6>БИЗНЕС</h6>
                <h2>Информация за бизнеса</h2>
            </div>

            @if ($details)

                <div class="user-details-grid mb-5">

                    {{-- COMPANY NAME --}}
                    <div class="user-details-card">

                        <p class="user-details-label">
                            Име на компанията / услугата
                        </p>

                        <p class="user-details-value">
                            {{ $details->company_name ?? 'Не е добавено' }}
                        </p>

                    </div>

                    {{-- CITY --}}
                    <div class="user-details-card">

                        <p class="user-details-label">
                            Град
                        </p>

                        <p class="user-details-value">
                            {{ $details->city ?? 'Не е добавен' }}
                        </p>

                    </div>

                    {{-- WEBSITE --}}
                    <div class="user-details-card">

                        <p class="user-details-label">
                            Уебсайт
                        </p>

                        <p class="user-details-value">

                            @if ($details->website)

                                <a
                                    href="{{ $details->website }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="user-details-link"
                                >
                                    {{ $details->website }}
                                </a>

                            @else

                                <span class="user-details-empty">
                                    Не е добавен
                                </span>

                            @endif

                        </p>

                    </div>

                    {{-- BUSINESS DESCRIPTION --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Описание на бизнеса
                        </p>

                        <p class="user-details-value description">
                            {{ $details->business_description ?? 'Не е добавено описание.' }}
                        </p>

                    </div>

                    {{-- BRAND INFORMATION --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Информация за бранда
                        </p>

                        <p class="user-details-value description">
                            {{ $details->brand_information ?? 'Не е добавена информация за бранда.' }}
                        </p>

                    </div>

                    {{-- VIDEO AD REQUIREMENTS --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Допълнителни изисквания към видео рекламата
                        </p>

                        <p class="user-details-value description">
                            {{ $details->video_ad_requirements ?? 'Няма добавени допълнителни изисквания.' }}
                        </p>

                    </div>

                    {{-- ADDITIONAL NOTES --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Допълнителни бележки
                        </p>

                        <p class="user-details-value description">
                            {{ $details->additional_notes ?? 'Няма добавени допълнителни бележки.' }}
                        </p>

                    </div>

                </div>

                <div class="heading two mb-4">

                    <h6>ФАЙЛОВЕ</h6>

                    <h2>Качени материали</h2>

                    <p class="pt-lg-3 pt-md-2">
                        Лого, изображения, видеа и гласови записи,
                        предоставени от потребителя.
                    </p>

                </div>

                <div class="user-details-grid">

                    {{-- LOGO --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Лого
                        </p>

                        @if ($details->logo)

                            <div class="downloadable-media material-item">

                                {{-- PREVIEW --}}
                                <a
                                    href="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <img
                                        src="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                                        alt="{{ $details->company_name }} Logo"
                                        class="user-details-logo"
                                    >
                                </a>

                                {{-- DOWNLOAD --}}
                                <a
                                    href="{{ asset('assets/img/dashboard/business_logo/' . $details->logo) }}"
                                    download="{{ $details->logo }}"
                                    class="media-download-btn"
                                    title="Изтегли логото"
                                >
                                    <i class="fa-solid fa-download"></i>
                                </a>

                                {{-- DELETE --}}
                                <button
                                    type="button"
                                    class="material-delete-btn"
                                    data-material-type="logo"
                                    data-material-filename="{{ $details->logo }}"
                                    title="Изтрий логото"
                                    aria-label="Изтрий логото"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>

                        @else

                            <p class="user-details-value">
                                <span class="user-details-empty">
                                    Няма качено лого
                                </span>
                            </p>

                        @endif

                    </div>

                    {{-- IMAGES --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Изображения
                        </p>

                        @if (!empty($details->images))

                            <div class="user-details-images">

                                @foreach ($details->images as $image)

                                    <div class="downloadable-media material-item">

                                        {{-- PREVIEW --}}
                                        <a
                                            href="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            <img
                                                src="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                                alt="Business Image"
                                                class="user-details-image"
                                            >
                                        </a>

                                        {{-- DOWNLOAD --}}
                                        <a
                                            href="{{ asset('assets/img/dashboard/business_images/' . $image) }}"
                                            download="{{ $image }}"
                                            class="media-download-btn"
                                            title="Изтегли изображението"
                                        >
                                            <i class="fa-solid fa-download"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <button
                                            type="button"
                                            class="material-delete-btn"
                                            data-material-type="images"
                                            data-material-filename="{{ $image }}"
                                            title="Изтрий изображението"
                                            aria-label="Изтрий изображението"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <p class="user-details-value">
                                <span class="user-details-empty">
                                    Няма качени изображения
                                </span>
                            </p>

                        @endif

                    </div>

                    {{-- VIDEOS --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Видеа
                        </p>

                        @if (!empty($details->videos))

                            <div class="user-details-videos">

                                @foreach ($details->videos as $video)

                                    <div class="downloadable-media material-item">

                                        {{-- VIDEO PLAYER --}}
                                        <video
                                            controls
                                            preload="metadata"
                                            class="user-details-video"
                                        >
                                            <source
                                                src="{{ asset('assets/img/dashboard/business_video/' . $video) }}"
                                            >

                                            Вашият браузър не поддържа видео.
                                        </video>

                                        {{-- DOWNLOAD --}}
                                        <a
                                            href="{{ asset('assets/img/dashboard/business_video/' . $video) }}"
                                            download="{{ $video }}"
                                            class="media-download-btn"
                                            title="Изтегли видеото"
                                        >
                                            <i class="fa-solid fa-download"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <button
                                            type="button"
                                            class="material-delete-btn"
                                            data-material-type="videos"
                                            data-material-filename="{{ $video }}"
                                            title="Изтрий видеото"
                                            aria-label="Изтрий видеото"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <p class="user-details-value">
                                <span class="user-details-empty">
                                    Няма качени видеа
                                </span>
                            </p>

                        @endif

                    </div>

                    {{-- VOICE RECORDING --}}
                    <div class="user-details-card full-width">

                        <p class="user-details-label">
                            Запис на глас
                        </p>

                        @if ($details->voice_recording)

                            <div class="downloadable-media material-item material-item--audio">

                                {{-- AUDIO PLAYER --}}
                                <audio
                                    controls
                                    preload="metadata"
                                    class="user-details-audio"
                                >
                                    <source
                                        src="{{ asset('assets/img/dashboard/business_audio/' . $details->voice_recording) }}"
                                    >

                                    Вашият браузър не поддържа аудио.
                                </audio>

                                {{-- DOWNLOAD --}}
                                <a
                                    href="{{ asset('assets/img/dashboard/business_audio/' . $details->voice_recording) }}"
                                    download="{{ $details->voice_recording }}"
                                    class="media-download-btn"
                                    title="Изтегли аудиото"
                                >
                                    <i class="fa-solid fa-download"></i>
                                </a>

                                {{-- DELETE --}}
                                <button
                                    type="button"
                                    class="material-delete-btn"
                                    data-material-type="voice_recording"
                                    data-material-filename="{{ $details->voice_recording }}"
                                    title="Изтрий аудиото"
                                    aria-label="Изтрий аудиото"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>

                        @else

                            <p class="user-details-value">
                                <span class="user-details-empty">
                                    Няма качен запис на глас
                                </span>
                            </p>

                        @endif

                    </div>

                </div>

            @else

                <div class="alert alert-info">
                    Този потребител все още не е предоставил информация
                    и материали за своя бизнес.
                </div>

            @endif

            <div class="mt-5">

                <a href="{{ route('admin.users.index') }}" class="btn">
                    Назад към потребителите
                </a>

            </div>

        </section>

    </div>


    {{-- DELETE MATERIAL MODAL --}}
    @if ($details)

        <div
            class="modal fade"
            id="deleteMaterialModal"
            tabindex="-1"
            aria-labelledby="deleteMaterialModalLabel"
            aria-hidden="true"
        >

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content custom-delete-modal">

                    <div class="modal-body p-4 p-md-5 text-center">

                        <div class="delete-modal-icon mb-4">
                            <i class="fa-solid fa-trash-can"></i>
                        </div>

                        <h4 class="mb-3" id="deleteMaterialModalLabel">
                            Изтриване на ресурс
                        </h4>

                        <p class="text-muted mb-4">
                            Сигурни ли сте, че искате да изтриете този ресурс?
                        </p>

                        <div class="delete-form-preview mb-4">

                            <span class="text-muted small d-block mb-1">
                                Избран ресурс
                            </span>

                            <strong id="deleteMaterialValue"></strong>

                        </div>

                        <form
                            id="deleteMaterialForm"
                            action="{{ route('admin.users.ads.material.delete', [
                                'user' => $user,
                                'ad' => $details,
                            ]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <input
                                type="hidden"
                                name="type"
                                id="deleteMaterialType"
                            >

                            <input
                                type="hidden"
                                name="filename"
                                id="deleteMaterialFilename"
                            >

                            <div class="d-flex justify-content-center gap-2">

                                <button
                                    type="button"
                                    class="btn btn-light rounded-pill px-4"
                                    data-bs-dismiss="modal"
                                >
                                    Отказ
                                </button>

                                <button
                                    type="submit"
                                    class="btn btn-danger rounded-pill px-4"
                                    id="confirmDeleteMaterial"
                                >
                                    <i class="fa-solid fa-trash-can me-2"></i>
                                    Изтрий
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endif


    {{-- DELETE MATERIAL JAVASCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modalElement = document.getElementById('deleteMaterialModal');

            if (!modalElement) {
                return;
            }

            const deleteModal = new bootstrap.Modal(modalElement);

            const materialTypeInput = document.getElementById('deleteMaterialType');
            const materialFilenameInput = document.getElementById('deleteMaterialFilename');
            const materialValue = document.getElementById('deleteMaterialValue');

            const deleteForm = document.getElementById('deleteMaterialForm');
            const confirmButton = document.getElementById('confirmDeleteMaterial');

            const materialLabels = {
                logo: 'Лого',
                images: 'Изображение',
                videos: 'Видео',
                voice_recording: 'Запис на глас'
            };

            document.querySelectorAll('.material-delete-btn').forEach(function (button) {

                button.addEventListener('click', function () {

                    const type = button.dataset.materialType;
                    const filename = button.dataset.materialFilename;

                    if (!type || !filename) {
                        return;
                    }

                    materialTypeInput.value = type;
                    materialFilenameInput.value = filename;

                    const label = materialLabels[type] || 'Ресурс';

                    materialValue.textContent = label + ': ' + filename;

                    deleteModal.show();

                });

            });

            // Prevent duplicate form submissions.
            deleteForm.addEventListener('submit', function (event) {

                if (!materialTypeInput.value || !materialFilenameInput.value) {
                    event.preventDefault();
                    return;
                }

                if (confirmButton.disabled) {
                    event.preventDefault();
                    return;
                }

                confirmButton.disabled = true;

                confirmButton.innerHTML = `
                    <i class="fa-solid fa-spinner fa-spin me-2"></i>
                    Изтриване...
                `;

            });

            modalElement.addEventListener('hidden.bs.modal', function () {

                materialTypeInput.value = '';
                materialFilenameInput.value = '';
                materialValue.textContent = '';

                confirmButton.disabled = false;

                confirmButton.innerHTML = `
                    <i class="fa-solid fa-trash-can me-2"></i>
                    Изтрий
                `;

            });

        });
    </script>

</x-backend>
