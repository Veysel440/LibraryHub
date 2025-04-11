<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'book_name'    => 'required|string|max:255',
            'writer'       => 'required|string|max:255',
            'isbn_no'      => 'required|unique:books,isbn_no,' . $this->route('id'),
            'book_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_file'    => 'nullable|mimes:pdf,doc,docx|max:10240'
        ];
    }
}
