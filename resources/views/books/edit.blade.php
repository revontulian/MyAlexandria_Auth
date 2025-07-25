<x-layout>
    <form method="POST" action="{{ route('books.update', $book->id) }}">
        <!-- CSRF token for security -->
        @csrf
        @method('PUT')
        <h2>Edit: {{ $book->title }}</h2>

        <!-- Book title -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>

        <!-- Book author -->
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>

        <!-- Book ISBN -->
        <label for="isbn">ISBN:</label>
        <input type="number" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>

        <!-- Book publication date -->
        <label for="published_date">Published Date:</label>
        <input type="date" id="published_date" name="published_date" value="{{ old('published_date', $book->published_date) }}" required>

        <!-- Book genre -->
        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <option value="" disable selected>Select a genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre }}" {{ old('genre', $book->genre) == $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
        </select>


        <!-- Book public status -->
        <label for="is_public" class="block mb-2">Do you want this book to be public?</label>
        <input type="hidden" name="is_public" value="0">
        <input type="checkbox" id="is_public" name="is_public" value="1" {{ old('is_public', $book->is_public) ? 'checked' : '' }}>

        <!-- Submit button -->
        <button type="submit" class="btn mt-4">Update Book</button>
        <a href="{{ route('books.show', $book->id) }}" class="btn mt-4">Cancel</a>


        <!-- Display validation errors -->
        @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </form>
</x-layout>
