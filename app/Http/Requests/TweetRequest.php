<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
            'content' => 'required | max:150',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '入力してください',
            'content.max' => '150文字以内でお願いします',
        ];
    }

    public function userId(): int
    {
        return $this->user()->id;
    }
}
