<?php

namespace App\Repositories;

use App\Models\Book;
use App\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookRepository implements BookRepositoryInterface
{
	private $book;

	public function __construct(Book $book)
	{
		$this->book = $book;
	}

	public function all()
	{
		return $this->book->all();
	}

	public function find(int $id)
	{
		return $this->book::findOrFail($id);
	}

	public function create(array $data = [], $image = '')
	{
        $imagePath = $this->saveBookImage($data['title'], $image);

        $book = $this->book::create($data);

		$this->saveAuthors($book, $data['author_id']);
		$this->saveImagePath($book['id'], $imagePath);
		return $book;
	}

    public function update(array $data = [], int $id, $image = '')
    {
        $oldFiles = [];
        $book = $this->find($id);
        foreach($book->images as $bookImage)
        {
            $oldFiles[] = 'public/' . $bookImage['image'];
        }

        $imagePath = $this->saveBookImage($data['title'], $image, $oldFiles);
        $this->saveImagePath($book['id'], $imagePath);

        $this->saveAuthors($book, $data['author_id']);
        return $book->update($data);
    }

    public function delete(int $id)
    {
        $oldFiles = [];
        $book = $this->book->find($id);

        foreach($book->images as $bookImage) {
        	$oldFiles[] = 'public/' . $bookImage['image'];
        } 
        $this->deleteImage($oldFiles);       

        return $book->delete();
    }

    public function findNotRead()
    {
        $book = $this->book->where('read',0)->get();

        $book = $book->shuffle()->slice(0,1);
        $book = $book[0];

        return $book;
    }

    private function saveAuthors($book, $authorId)
    {
        return $book->authors()->sync($authorId);
    }

    private function saveBookImage($title, $bookImage, $oldFiles = [])
    {
        if ($oldFiles && count($oldFiles) > 0) {
            $this->deleteImage($oldFiles);
        }

        $path = '';        
        $fileName =  Str::snake($title);

        if (isset($bookImage) && $bookImage->isValid()) {
            $extension = $bookImage->getClientOriginalExtension();
            $path = $bookImage->storeAs('public/books', "{$fileName}.{$extension}");
        }

        return $path; 
    }

    private function deleteImage($imagePath)
    {
    	Storage::delete($imagePath);
    }

    private function saveImagePath($bookId, $imagePath)
    {
        $book = $this->book->find($bookId);

        return $book->images()->create([
            'image' => str_replace('public/','',$imagePath)
        ]);
    }            
}