<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Communication extends Model
{
    use HasFactory;

    protected $table = 'communication';

    protected $fillable = ['name', 'email', 'phone_number', 'subject', 'message'];
}
