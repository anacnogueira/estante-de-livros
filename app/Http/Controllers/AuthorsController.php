<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Repositories\AuthorRepository;

class AuthorsController extends Controller
{
    private AuthorRepository $repository;


    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $authors = $this->repository->all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(CreateAuthorRequest $request)
    {
        $this->repository->create($request->post());

        return redirect()->route('admin.author.index');
    }

    public function show($id)
    {
        $author = $this->repository->find($id);
        return view('authors.show', compact('author'));
    }

    public function edit($id)
    {
        $author = $this->repository->find($id);
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, $id)
    {
        $this->repository->update($request->post(), $id);

        return redirect()->route('admin.author.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route("admin.author.index");
    }
}
