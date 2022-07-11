<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'keyword' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => '入力してください',
        ];
    }

    public function userId(): int
    {
        return $this->user()->id;
    }
}
