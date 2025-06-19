<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'published_date',
        'genre',
        'is_public',
    ];
    
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
}
