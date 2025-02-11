<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $table = 'about_us';
    protected $fillable = [
        'title',
        'text',
        'vision',
        'images',
        'phone',
        'email',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
