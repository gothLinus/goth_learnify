<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'time' => ['required', 'date_format:H:i'],
            'multiple_files' => 'nullable|sometimes|bail',
            'multiple_files.*' => ['nullable', 'sometimes', 'bail', 'file', 'mimes:jpg,jpeg,png,pdf,docx,doc', 'max:2048'],
            'user_id' => 'prohibited',
            'collection_id' => ['required', 'exists:collections,id']
        ];
    }
}
