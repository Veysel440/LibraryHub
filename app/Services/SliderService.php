<?php

namespace App\Services;

use App\Models\Slider;
use App\Services\Contracts\SliderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderService implements SliderServiceInterface
{
    public function getAll()
    {
        return Slider::all();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('slider_images', 'public');
        }

        return Slider::create($data);
    }

    public function update(Slider $slider, array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $data['image'] = $data['image']->store('slider_images', 'public');
        } else {
            unset($data['image']);
        }

        $slider->update($data);
        return $slider;
    }

    public function delete(Slider $slider)
    {
       return $slider->delete();
    }
}
