<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\BookRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\CategoryRepository;

class BooksController extends Controller
{
    private BookRepository $repository;
    private $author;
    private $category;

    public function __construct(
        BookRepository $repository,
        AuthorRepository $author,
        CategoryRepository $category
    )
    {
        $this->repository = $repository;
        $this->author = $author;
        $this->category = $category;
    }

    public function index()
    {        
        $books = $this->repository->all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = $this->getAuthors();
        $categories = $this->getCategories();

        return view('books.create', compact('authors','categories'));
    }

    public function store(CreateBookRequest $request)
    {        
        $book = $this->repository->create($request->post(), $request->image);       

        return redirect()->route('admin.book.index');
    }

    public function show($id)
    {
        $book = $this->repository->find($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $authors = $this->getAuthors();
        $categories = $this->getCategories();
        
        $book = $this->repository->find($id);        

        return view('books.edit', compact('book','authors', 'categories'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $this->repository->update($request->post(), $id, $request->image);

        return redirect()->route('admin.book.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);  

        return redirect()->route("admin.book.index");
    }

    public function toBeRead()
    {
        $book = $this->repository->findNotRead();   

        return view('books.show', compact('book'));
    }   

    private function getAuthors()
    {
        $authors = [];
        $data = $this->author->all()->sortBy('name');
        foreach($data as $item) {
            $authors[$item->id] = $item->name;
        }

        return $authors;
    }

    private function getCategories()
    {
        $categories = [];
        $data = $this->category->all()->sortBy('name');

        foreach($data as $item) {
            $categories[$item->id] = $item->name;
        }

        return $categories;
    }   
}
