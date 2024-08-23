<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
            'content' => 'required|min:1|max:240',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => "The idea field is required.",
            'content.min' => "The idea field must be at least 1 characters.",
            'content.max' => "The idea field must not be greater than 240 characters."
        ];
    }
}
