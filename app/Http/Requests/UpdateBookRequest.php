<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'read' => ['required','boolean'],
            'author_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O Campo título é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório.',
            'read.required' => 'Selecione se o livro foi lido',
            'read.boolean' => 'Selecione sim ou não',
            'author_id.required' => "O campo autor é obrigatório.",
        ];
    }
}
