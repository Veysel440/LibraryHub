<?php

namespace App\Http\Controllers;

use App\Services\Contracts\SliderServiceInterface;
use App\Services\SliderService;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderServiceInterface  $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function index()
    {
        $sliders = $this->sliderService->getAll();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderStoreRequest $request)
    {
        $this->sliderService->store($request->validated());
        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla eklendi!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $this->sliderService->update($slider, $request->validated());

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $this->sliderService->delete($slider);
        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla silindi!');
    }
}
