<?php

namespace App\Services;

use App\Models\Contact;
use App\Services\Contracts\ContactServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactService implements ContactServiceInterface
{
    public function store(array $data)
    {
        return Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
    }
}
