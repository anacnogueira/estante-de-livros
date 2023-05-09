<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;

class CategoriesController extends Controller
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->repository->create($request->post());

        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        $category = $this->repository->find($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->repository->update($request->post(), $id);

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route("admin.category.index");
    }
}
