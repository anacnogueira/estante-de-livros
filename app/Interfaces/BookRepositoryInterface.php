<?php

namespace App\Interfaces;

interface BookRepositoryInterface
{
	public function all();

	public function find(int $id);

	public function create(array $data = [], $image);

    public function update(array $data = [], int $id, $image);

	public function delete(int $id);
}
