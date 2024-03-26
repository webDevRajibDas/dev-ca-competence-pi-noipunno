<?php

namespace App\Http\Requests\Oviggota;

use Illuminate\Foundation\Http\FormRequest;

class CopyOviggotaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "oviggotaArr"    => "required|array",
            "oviggotaArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'oviggotaArr.required' => 'অনুগ্রহ করে, অভিজ্ঞতা সিলেক্ট করুন।'
        ];
    }
}
