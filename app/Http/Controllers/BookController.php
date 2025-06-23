<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // route '/index' to list all books
        // Logic to retrieve and return a list of books
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('books.index', ['books' => $books]); // Assuming you have a view named 'books.index'
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
        $genres = ['Fiction', 'Non-Fiction', 'Science Fiction', 'Fantasy', 'Mystery']; // Example genres
        return view('books.add', ['genres' => $genres]);
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
}
