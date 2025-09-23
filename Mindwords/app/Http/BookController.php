<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function displayBook()
    {
        // Lấy tất cả book
        $books = Book::all();
        return view('Book', compact('books'));
    }

    public function editBook(Request $request)
    {
        $id = $request->id;
        $book = Book::findOrFail($id); // tìm book theo id
        return view('EditBook', compact('book'));
    }

    public function saveBook(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $describe = $request->input('describe');

        // update bằng Eloquent
        $book = Book::findOrFail($id);
        $book->update([
            'name' => $name,
            'describe' => $describe,
        ]);

        $books = Book::all();
        return view('Book', compact('books'));
    }
}
