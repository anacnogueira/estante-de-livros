<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','max:255'],
            'category_id' => ['required','integer'],
            'type' => ['required', Rule::in('paper','ebook')],
            'author_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O Campo título é obrigatório',
            'category_id.required' => "O campo categoria é obrigatório.",
            'author_id.required' => "O campo autor é obrigatório.",
        ];
    }
}
