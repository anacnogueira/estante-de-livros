<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'description'
    ];

    public function books() 
    {
        return $this->belongsToMany(Book::class);
    }


}
