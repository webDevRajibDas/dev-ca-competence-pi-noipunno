<?php

namespace App\Http\Requests\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class CopyChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "chapterArr"    => "required|array",
            "chapterArr.*"  => "required|string|distinct",
        ];
    }

    public function messages()
    {
        return [
            'chapterArr.required' => 'অনুগ্রহ করে, অধ্যায় সিলেক্ট করুন।'
        ];
    }
}
