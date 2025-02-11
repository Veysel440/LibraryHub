<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name', 'writer', 'publishing_house', 'publication_date',
        'category', 'isbn_no', 'page_number', 'book_content', 'book_picture','book_file'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
