<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $adminbooks = Book::all();
        return view('admin.books.index', compact('adminbooks'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_name'    => 'required|string|max:255',
            'writer'       => 'required|string|max:255',
            'isbn_no'      => 'required|unique:books,isbn_no',
            'book_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_file'    => 'nullable|mimes:pdf,doc,docx|max:10240'
        ]);

        $book = new Book();
        $book->book_name        = $request->book_name;
        $book->writer           = $request->writer;
        $book->publishing_house = $request->publishing_house;
        $book->category         = $request->category;
        $book->isbn_no          = $request->isbn_no;
        $book->page_number      = $request->page_number;
        $book->book_content     = $request->book_content;

        // Kitap resmi yükleme
        if ($request->hasFile('book_picture')) {
            $file = $request->file('book_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('book_pictures', $filename, 'public');
            $book->book_picture = $path;
        }

        // Kitap dosyası (PDF, DOCX) yükleme
        if ($request->hasFile('book_file')) {
            $file = $request->file('book_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('book_files', $filename, 'public'); // Dosya, book_files dizinine kaydedilecek
            $book->book_file = $path;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla eklendi.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'isbn_no' => 'required|unique:books,isbn_no,' . $id, // Güncelleme için benzersizlik kontrolü
            'book_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_file' => 'nullable|mimes:pdf,doc,docx|max:10240', // Kitap dosyası kontrolü
        ]);

        $book = Book::findOrFail($id);
        $book->book_name = $request->book_name;
        $book->writer = $request->writer;
        $book->publishing_house = $request->publishing_house;
        $book->category = $request->category;
        $book->isbn_no = $request->isbn_no;
        $book->page_number = $request->page_number;
        $book->book_content = $request->book_content;

        // Kitap resmi güncelleme
        if ($request->hasFile('book_picture')) {
            if ($book->book_picture && Storage::disk('public')->exists($book->book_picture)) {
                Storage::disk('public')->delete($book->book_picture);
            }

            $file = $request->file('book_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('book_pictures', $filename, 'public');
            $book->book_picture = $path;
        }

        // Kitap dosyası güncelleme
        if ($request->hasFile('book_file')) {
            if ($book->book_file && Storage::disk('public')->exists($book->book_file)) {
                Storage::disk('public')->delete($book->book_file);
            }

            $file = $request->file('book_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('book_files', $filename, 'public'); // Dosya, book_files dizinine kaydedilecek
            $book->book_file = $path;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla silindi.');
    }

}
