<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'book_id',
        'image'
    ];

    public  function book()
    {
        return $this->belongsTo(Book::class);
    }
}
