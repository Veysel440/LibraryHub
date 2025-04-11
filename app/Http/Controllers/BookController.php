<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\Contracts\BookServiceInterface;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $adminbooks = $this->bookService->getAll();
        return view('admin.books.index', compact('adminbooks'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(BookRequest $request)
    {
        $this->bookService->store($request->validated());
        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla eklendi.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $this->bookService->update($request->validated(), $book);
        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $this->bookService->delete($book);
        return redirect()->route('admin.books.index')->with('success', 'Kitap başarıyla silindi.');
    }

}
