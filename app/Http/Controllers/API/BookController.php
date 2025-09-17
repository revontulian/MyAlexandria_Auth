<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BookController extends Controller
{
    public function getBooks()
    {
        $books = Book::all();

        if (!$books) {
            return response()->json([
                "status" => 0,
                "message" => "Book not found"
            ], 404);
        }

        if ($books->isEmpty()) {
            return response()->json([
                "status" => 1,
                "message" => "No books found",
                "data" => []
            ]);
        }

        // Logic to retrieve books
        return response()->json([
            "status" => 1,
            "data" => $books // Replace with actual book data
        ]);
    }

    public function getBook(string $id)
    {
        $book = Book::where('id', $id)->get();

        if (!$book) {
            return response()->json([
                "status" => 0,
                "message" => "Book not found"
            ], 404);
        }

        return response()->json([
            "status" => 1,
            "data" => $book
        ]);
    }

    public function createBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'genre' => 'required|string|max:50',
            'published_date' => 'required|date',
            'is_public' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation failed",
                "data" => $validator->errors()->all()
            ]);
        }

        $validatedData = $validator->validated();
        $validatedData['user_id'] = Auth::id();


        $book = Book::create($validatedData);

        return response()->json([
            "status" => 1,
            "message" => "Book created successfully",
            "data" => $book
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function updateBook(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validatedBook = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'genre' => 'required|string|max:50',
            'published_date' => 'required|date',
            'is_public' => 'nullable|boolean',
        ]);

        if ($validatedBook->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation failed",
                "data" => $validatedBook->errors()->all()
            ]);
        }

        $book->update($validatedBook->validated());

        return response()->json([
            "status" => 1,
            "message" => "Book updated successfully",
            "data" => $book
        ]);
    }

    public function deleteBook(string $id)
    {
        $book = Book::findOrFail($id);

        if (!$book) {
            return response()->json([
                "status" => 0,
                "message" => "Book not found"
            ], 404);
        }

        $book->delete();

        return response()->json([
            "status" => 1,
            "message" => "Book deleted successfully"
        ], 201);
    }

    public function getStats()
    {
        $totalBooks = Book::count();
        $publicBooks = Book::where('is_public', true)->count();
        $privateBooks = Book::where('is_public', false)->count();

        return response()->json([
            "status" => 1,
            "data" => [
                "total_books" => $totalBooks,
                "public_books" => $publicBooks,
                "private_books" => $privateBooks,
            ]
        ]);
    }

    public function countUsersWithBooksByAuthor(string $author)
    {
        $count = Book::where('author', $author)
            ->distinct('user_id')
            ->count('user_id');

        return response()->json([
            "status" => 1,
            "users_with_books_by_author" => $count
        ]);
    }
}
