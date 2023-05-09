<?php

namespace App\Validators;

use \Prettus\Validator\LaravelValidator;


class AuthorValidator extends LaravelValidator
{
	protected $rules = [
		'name' => 'required|max:255'
	];

	protected $messages = [
			'name.required' => 'O campo nome é obrigatório',
	];
}