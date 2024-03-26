<?php

namespace App\Http\Requests\BiDimension;

use Illuminate\Foundation\Http\FormRequest;

class CopyBiDimensionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "biDimensionArr"    => "required|array",
            "biDimensionArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'biDimensionArr.required' => 'অনুগ্রহ করে, Bi ডাইমেনশন সিলেক্ট করুন।'
        ];
    }
}
