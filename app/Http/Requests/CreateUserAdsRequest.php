<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserAdsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name'          => ['required', 'string', 'max:255'],
            'business_description'  => ['required', 'string'],
            'website'               => ['nullable', 'url', 'max:255'],
            'city'                  => ['required', 'string', 'max:255'],
            'phone'                 => ['required', 'string', 'max:50'],
            'brand_information'     => ['nullable', 'string'],
            'logo'                  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'images'                => ['nullable', 'array'],
            'images.*'              => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'videos'                => ['nullable', 'array'],
            'videos.*'              => ['file', 'mimetypes:video/mp4,video/mpeg,video/quicktime,video/x-msvideo,video/webm', 'max:1048576'],
            'voice_recording'       => ['nullable', 'file', 'mimetypes:audio/mpeg,audio/mp4,audio/x-m4a,audio/wav,audio/x-wav,audio/webm,audio/ogg', 'max:102400'],
            'video_ad_requirements' => ['nullable', 'string'],
            'additional_notes'      => ['nullable', 'string'],
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'company_name.required'         => 'Моля, въведете име на компанията или услугата.',
            'company_name.string'           => 'Името на компанията трябва да бъде текст.',
            'company_name.max'              => 'Името на компанията не може да бъде по-дълго от 255 символа.',
            'business_description.required' => 'Моля, въведете описание на бизнеса.',
            'business_description.string'   => 'Описанието на бизнеса трябва да бъде текст.',
            'website.url'                   => 'Моля, въведете валиден адрес на уебсайт.',
            'website.max'                   => 'Адресът на уебсайта не може да бъде по-дълъг от 255 символа.',
            'city.required'                 => 'Моля, въведете град.',
            'city.string'                   => 'Градът трябва да бъде текст.',
            'city.max'                      => 'Името на града не може да бъде по-дълго от 255 символа.',
            'phone.required'                => 'Моля, въведете телефонен номер.',
            'phone.string'                  => 'Телефонният номер трябва да бъде текст.',
            'phone.max'                     => 'Телефонният номер не може да бъде по-дълъг от 50 символа.',
            'brand_information.string'      => 'Информацията за бранда трябва да бъде текст.',
            'logo.image'                    => 'Логото трябва да бъде изображение.',
            'logo.mimes'                    => 'Логото трябва да бъде във формат JPG, JPEG, PNG или WEBP.',
            'logo.max'                      => 'Логото не може да бъде по-голямо от 2 MB.',
            'images.array'                  => 'Изображенията трябва да бъдат изпратени като списък от файлове.',
            'images.*.image'                => 'Всеки качен файл трябва да бъде изображение.',
            'images.*.mimes'                => 'Изображенията трябва да бъдат във формат JPG, JPEG, PNG или WEBP.',
            'images.*.max'                  => 'Всяко изображение не може да бъде по-голямо от 2 MB.',
            'videos.array'                  => 'Видеата трябва да бъдат изпратени като списък от файлове.',
            'videos.*.file'                 => 'Всеки качен видео файл трябва да бъде валиден файл.',
            'videos.*.mimetypes'            => 'Позволените видео формати са MP4, MPEG, MOV, AVI и WEBM.',
            'videos.*.max'                  => 'Всеки видео файл не може да бъде по-голям от 1 GB.',
            'voice_recording.file'          => 'Записът на глас трябва да бъде валиден аудио файл.',
            'voice_recording.mimetypes'     => 'Моля, качете валиден аудио файл.',
            'voice_recording.max'           => 'Аудио файлът не може да бъде по-голям от 100 MB.',
            'video_ad_requirements.string'  => 'Допълнителните изисквания към видео рекламата трябва да бъдат текст.',
            'additional_notes.string'       => 'Допълнителните бележки трябва да бъдат текст.',
        ];
    }
}
