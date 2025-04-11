<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Communication;
use App\Services\Contracts\ContactServiceInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactServiceInterface $communicationService)
    {
        $this->contactService = $communicationService;
    }

    public function index()
    {
        return view('contact.index');
    }

    public function store(ContactRequest $request)
    {
       $this->contactService->store($request->validated());
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
