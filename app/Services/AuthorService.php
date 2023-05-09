<?php

namespace App\Services;

use App\Interfaces\AuthorRepositoryInterface;
use App\Validators\AuthorValidator;
use \Prettus\Validator\Exceptions\ValidatorException;

class AuthorService
{
	protected $repository;
	protected $validator;

	public function __construct(AuthorRepositoryInterface $repository, AuthorValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function create(array $data)
	{
		try {
			$this->validator->with($data)->passesOrFail();
			//$this->repository->create($data);

			return true;
		} catch (ValidatorException $e) {
			return [
				'error' => true,
				'message' => $e->getMessage()
			];
		}
	}
}