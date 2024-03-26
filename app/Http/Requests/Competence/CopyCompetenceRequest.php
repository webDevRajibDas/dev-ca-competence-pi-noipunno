<?php

namespace App\Http\Requests\Competence;

use Illuminate\Foundation\Http\FormRequest;

class CopyCompetenceRequest extends FormRequest
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
            "competenceArr"    => "required|array",
            "competenceArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'competenceArr.required' => 'অনুগ্রহ করে, একক যোগ্যতা সিলেক্ট করুন।'
        ];
    }
}
