<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'pages',
        'isbn',
        'read',
        'type',
        'summary'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(BookImage::class);
    }
}
