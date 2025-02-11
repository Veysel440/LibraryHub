<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {

        return view('admin.slider.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'main_title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imagePath = $request->file('image')->store('slider_images', 'public');


        Slider::create([
            'main_title' => $request->main_title,
            'sub_title' => $request->sub_title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla eklendi!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'main_title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider_images', 'public');
            $slider->image = $imagePath;
        }

        $slider->update([
            'main_title' => $request->main_title,
            'sub_title' => $request->sub_title,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider başarıyla silindi!');
    }
}
