<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    protected $genres = [
        'Fiction',
        'Non-Fiction',
        'Science Fiction',
        'Fantasy',
        'Mystery',
    ];

    public function index()
    {
        // route '/index' to list all books
        // Logic to retrieve and return a list of books
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('books.index', ['books' => $books]);
    }

    public function show($id)
    {
        // route '/show/{id}' to retrieve a single book by ID
        // Logic to retrieve and return a single book by ID
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    public function add()
    {
        // route '/add' to show a form for adding a new book
        // Logic to show a form for adding a new book
        return view('books.add', ['genres' => $this->genres]);
    }

    public function store(Request $request)
    {
        // route '/store' to handle the submission of the new book form
        // Logic to validate and create a new book
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'genre' => 'required|string|max:50',
            'published_date' => 'required|date',
            'is_public' => 'nullable|boolean',
        ]);

        Book::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit($id)
    {
        // route '/edit/{id}' to show a form for editing an existing book
        // Logic to retrieve the book and show the edit form
        $book = Book::findOrFail($id);


        return view('books.edit', ['book' => $book, 'genres' => $this->genres]);
    }

    public function update(Request $request, $id)
    {
        // route '/update/{id}' to handle the submission of the edit book form
        // Logic to validate and update an existing book
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn,' . $book->id,
            'genre' => 'required|string|max:50',
            'published_date' => 'required|date',
            'is_public' => 'nullable|boolean',
        ]);

        $book->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }
}
