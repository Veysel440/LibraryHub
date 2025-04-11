<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Services\Contracts\AboutServiceInterface;
use Illuminate\Http\Request;
use App\Models\About;

class AboutusController extends Controller
{
    protected $aboutService;

    public function __construct(AboutServiceInterface $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    public function index()
    {
        $aboutUs = $this->aboutService->getAll();
        return view('admin.about.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(AboutRequest $request)
    {
        $this->aboutService->store($request->validated());
        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi başarıyla eklendi!');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(AboutRequest $request, $id)
    {
        $about = About::findOrFail($id);
        $this->aboutService->update($request->validated(), $about);
        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $this->aboutService->delete($about);
        return redirect()->route('admin.about.index')->with('success', 'Hakkımızda bilgisi başarıyla silindi!');
    }
}
