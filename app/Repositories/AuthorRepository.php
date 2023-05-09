<?php

namespace App\Repositories;

use App\Models\Author;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
	private $author;

	public function __construct(Author $author)
	{
		$this->author = $author;
	}

	public function all()
	{
		return $this->author->all();
	}

	public function find(int $id)
	{
		return $this->author::findOrFail($id);
	}

	public function create(array $data = [])
	{
		return $this->author::create($data);
	}

    public function update(array $data = [], int $id)
    {
        $author = $this->find($id);
        $author->name = $data['name'];
        $author->description = $data['description'];
        return $author->save();
    }

    public function delete(int $id)
    {
        return $this->author->destroy($id);
    }
}
