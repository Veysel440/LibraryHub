<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'comment' => 'required|string',
        ]);

        $book = Book::findOrFail($id);

        $comment = new Comment();
        $comment->book_id = $book->id;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('books.show', $book->id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_text' => 'required',
            'book_id' => 'required|exists:books,id',
        ]);

        Comment::create([
            'user_name' => auth()->user()->name,
            'comment_text' => $request->comment_text,
            'book_id' => $request->book_id,
        ]);

        return redirect()->back()->with('success', 'Yorum başarıyla eklendi!');
    }
}
