<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hakkimizda extends Model
{
    use HasFactory;

    protected $table = 'hakkimizda';
    protected $fillable = ['text', 'image', 'latitude', 'longitude'];
}
