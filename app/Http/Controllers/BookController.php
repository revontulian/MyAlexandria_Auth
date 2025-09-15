<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BookController extends Controller
{
    protected $genres = [
        'Adventure',
        'Art',
        'Autobiography',
        'Biography',
        'Business',
        'Children\'s',
        'Classics',
        'Comics/Graphic Novels',
        'Contemporary',
        'Cooking',
        'Crime',
        'Drama',
        'Education',
        'Fantasy',
        'Fiction',
        'Historical Fiction',
        'History',
        'Horror',
        'Literary Fiction',
        'Memoir',
        'Mystery',
        'Non-Fiction',
        'Philosophy',
        'Poetry',
        'Religion',
        'Romance',
        'Science',
        'Science Fiction',
        'Self-Help',
        'Technology',
        'Thriller',
        'Travel',
        'Young Adult'
    ];

    public function index()
    {
        // route '/index' to list all books
        // Logic to retrieve and return a list of books
        $user = Auth::user();

        $books = Book::where(function ($query) {
            $query->where('owner_user_id', Auth::id())
                ->orWhere('current_user_id', Auth::id());
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('books.index', ['books' => $books, 'user' => $user]);
    }

    public function show_public_shelf($id)
    {
        // route '/shelf/{user_id}' to show a public shelf of books
        // Logic to retrieve and return a public shelf of books by user ID
        $user = User::findOrFail($id);

        $books = Book::where('owner_user_id', $id)
            ->where('is_public', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('books.index', ['books' => $books, 'user' => $user]);
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
        $validated['owner_user_id'] = Auth::id();
        $validated['current_user_id'] = Auth::id();

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

    public function destroy($id)
    {
        // route '/destroy/{id}' to delete a book
        // Logic to delete a book by ID
        $book = Book::findOrFail($id);
        $book->delete();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function borrow($id)
    {
        // route '/borrow/{id}' to borrow a book
        // Logic to mark a book as borrowed by the current user
        $book = Book::findOrFail($id);
        $book->current_user_id = Auth::id();
        $book->save();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book borrowed successfully!');
    }

    public function returnBook($id)
    {
        // route '/return/{id}' to return a borrowed book
        // Logic to mark a book as returned (set current_user_id to null)
        $book = Book::findOrFail($id);
        $book->current_user_id = $book->owner_user_id;
        $book->save();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book returned successfully!');
    }
}
