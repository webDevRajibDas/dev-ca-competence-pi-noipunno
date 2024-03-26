<?php

namespace App\Http\Requests\Dimension;

use Illuminate\Foundation\Http\FormRequest;

class CopyDimensionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "dimensionArr"    => "required|array",
            "dimensionArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'dimensionArr.required' => 'অনুগ্রহ করে, ডাইমেনশন সিলেক্ট করুন।'
        ];
    }
}
