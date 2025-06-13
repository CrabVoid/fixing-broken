<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', compact("books"));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "title" => "required|string|max:140",
            "author" => "required|string|max:100",
            "released_at" => "required"
        ],
        [
            'title.required' => "title shall not be forgotten",
            'title.max' => 'max title lenght 140 characters',
            'author.required' => 'author must always be mentioned',
            'author.max' => 'max author lenght 100 characters',
            'released_at.required' => 'date is manditory',
        ]);

        $book = Book::create($validated);

        return redirect()->route('show', $book)->with("success", "book created successfully");
    }

    public function show($id) {
        $book = Book::find($id);
        return view('books.show', compact("book"));
    }

    public function edit($id) {
        $book = Book::find($id);
        return view('books.edit', compact("book"));
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);
         $validated = $request->validate([
            "title" => "required|string|max:140",
            "author" => "required|string|max:100",
            "released_at" => "required"
        ],
        [
            'title.required' => "title shall not be forgotten",
            'title.max' => 'max title lenght 140 characters',
            'author.required' => 'author must always be mentioned',
            'author.max' => 'max author lenght 100 characters',
            'released_at.required' => 'date is manditory',
        ]);
        $book->update($validated);

        return redirect()->route('show', $book)->with("success", "book edited successfully");
    }
}
