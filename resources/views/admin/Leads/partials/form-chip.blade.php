<div
    class="lead-form-chip"
    data-form-id="{{ $facebookForm->id }}"
>
    <span>
        {{ $facebookForm->form_id }}
    </span>

    <form
        method="POST"
        action="{{ route('leads.delete.formId', $facebookForm) }}"
        class="d-inline delete-form-id-form"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="lead-form-chip-delete"
            title="Изтрий"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>
    </form>
</div>
