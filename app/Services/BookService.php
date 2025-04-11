<?php

namespace App\Services;

use App\Models\Book;
use App\Services\Contracts\BookServiceInterface;
use Illuminate\Support\Facades\Storage;

class BookService implements BookServiceInterface
{
    public function getAll()
    {
        return Book::all();
    }

    public function store(array $data)
    {
        $book = new Book();
        $this->setBookData($book, $data);
        $book->save();
    }

    public function update(array $data, $book)
    {
        $this->setBookData($book, $data);
        $book->save();
    }

    public function delete($book)
    {

        if ($book->book_picture && Storage::disk('public')->exists($book->book_picture)) {
            Storage::disk('public')->delete($book->book_picture);
        }

        if ($book->book_file && Storage::disk('public')->exists($book->book_file)) {
            Storage::disk('public')->delete($book->book_file);
        }

        $book->delete();
    }

    private function setBookData($book, array $data)
    {
        $book->book_name = $data['book_name'];
        $book->writer = $data['writer'];
        $book->publishing_house = $data['publishing_house'];
        $book->category = $data['category'];
        $book->isbn_no = $data['isbn_no'];
        $book->page_number = $data['page_number'];
        $book->book_content = $data['book_content'];

        if (isset($data['book_picture'])) {
            $book->book_picture = $this->storeFile($data['book_picture'], 'book_pictures');
        }

        if (isset($data['book_file'])) {
            $book->book_file = $this->storeFile($data['book_file'], 'book_files');
        }
    }

    private function storeFile($file, $directory)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs($directory, $filename, 'public');
    }
}
