<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{

    public function index()
    {
        $communications = Communication::all();
        return view('admin.communication.index', compact('communications'));
    }


    public function create()
    {
        return view('admin.communication.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        Communication::create($validated);
        return redirect()->route('communication.index')->with('success', 'İletişim kaydı başarıyla eklendi!');
    }

    public function edit(Communication $communication)
    {
        return view('admin.communication.edit', compact('communication'));
    }


    public function update(Request $request, Communication $communication)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        $communication->update($validated);
        return redirect()->route('communication.index')->with('success', 'İletişim kaydı başarıyla güncellendi!');
    }



    public function destroy(Communication $communication)
    {
        $communication->delete();
        return redirect()->route('communication.index')->with('success', 'İletişim kaydı başarıyla silindi!');
    }
}
