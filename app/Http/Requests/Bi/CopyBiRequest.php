<?php

namespace App\Http\Requests\Bi;

use Illuminate\Foundation\Http\FormRequest;

class CopyBiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "biArr"    => "required|array",
            "biArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'biArr.required' => 'অনুগ্রহ করে, Bi সিলেক্ট করুন।'
        ];
    }
}
