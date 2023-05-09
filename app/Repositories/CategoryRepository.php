<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function all()
	{
		return $this->category->all();
	}

	public function find(int $id)
	{
		return $this->category::findOrFail($id);
	}

	public function create(array $data = [])
	{
		return $this->category::create($data);
	}

    public function update(array $data = [], int $id)
    {
        $category = $this->find($id);
        $category->name = $data['name'];

        return $category->save();
    }

    public function delete(int $id)
    {
        return $this->category->destroy($id);
    }
}
