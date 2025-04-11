<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

interface ContactServiceInterface
{
    public function store(array $data);
}
