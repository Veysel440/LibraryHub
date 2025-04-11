<?php

namespace App\Services\Contracts;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

interface SliderServiceInterface
{
    public function getAll();
    public function store(array $data);
    public function update(Slider $slider, array $data);
    public function delete(Slider $slider);
}
