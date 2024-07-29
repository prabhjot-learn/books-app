<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $book = Book::create($request->all());
        
        Log::info("Book created: ", $book->toArray());

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $book->update($request->all());
        
        Log::info("Book updated: ", $book->toArray());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        
        Log::info("Book deleted: ", $book->toArray());

        return redirect()->route('books.index');
    }
}
