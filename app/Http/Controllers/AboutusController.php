<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutusController extends Controller
{
    public function index()
    {
        $aboutUs = About::all();
        return view('admin.about.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'vision' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about = new About();
        $about->text = $request->text;
        $about->vision = $request->vision;
        $about->phone = $request->phone;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->facebook = $request->facebook;
        $about->twitter = $request->twitter;
        $about->instagram = $request->instagram;
        $about->youtube = $request->youtube;

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('about_images', 'public');
                $imagePaths[] = $imagePath;
            }
            $about->images = json_encode($imagePaths);
        }

        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi başarıyla eklendi!');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'text' => 'required|string',
            'vision' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about->text = $request->text;
        $about->vision = $request->vision;
        $about->phone = $request->phone;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->facebook = $request->facebook;
        $about->twitter = $request->twitter;
        $about->instagram = $request->instagram;
        $about->youtube = $request->youtube;

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('about_images', 'public');
                $imagePaths[] = $imagePath;
            }
            $about->images = json_encode($imagePaths);
        }

        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi güncellendi!');
    }

    public function destroy($id)
    {
        About::destroy($id);
        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi silindi!');
    }
}
