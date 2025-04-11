<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunicationRequest;
use App\Models\Communication;
use App\Services\Contracts\CommunicationServiceInterface;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{

    protected $communicationService;

    public function __construct(CommunicationServiceInterface $communicationService)
    {
        $this->communicationService = $communicationService;
    }

    public function index()
    {
        $communications = $this->communicationService->getAll();
        return view('admin.communication.index', compact('communications'));
    }

    public function create()
    {
        return view('admin.communication.create');
    }

    public function store(CommunicationRequest $request)
    {
        $this->communicationService->store($request->validated());
        return redirect()->route('admin.communication.index')->with('success', 'İletişim kaydı başarıyla eklendi!');
    }

    public function edit(Communication $communication)
    {
        return view('admin.communication.edit', compact('communication'));
    }

    public function update(CommunicationRequest $request, Communication $communication)
    {
        $this->communicationService->update($request->validated(), $communication);
        return redirect()->route('admin.communication.index')->with('success', 'İletişim kaydı başarıyla güncellendi!');
    }

    public function destroy(Communication $communication)
    {
        $this->communicationService->delete($communication);
        return redirect()->route('admin.communication.index')->with('success', 'İletişim kaydı başarıyla silindi!');
    }
}
