<?php

namespace App\Services\Contracts;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

interface CommunicationServiceInterface
{
    public function store(array $data);
    public function update(array $data, $communication);
    public function delete($communication);
    public function getAll();
}
