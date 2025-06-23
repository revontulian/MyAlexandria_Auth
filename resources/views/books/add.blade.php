<x-layout>
    <form method="POST" action="">
        <!-- CSRF token for security -->
        @csrf
        <h2>Add a new book</h2>

        <!-- Book title -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="" required>

        <!-- Book author -->
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="" required>

        <!-- Book ISBN -->
        <label for="isbn">ISBN:</label>
        <input type="number" id="isbn" name="isbn" value="" required>

        <!-- Book publication date -->
        <label for="published_date">Published Date:</label>
        <input type="date" id="published_date" name="published_date" value="">

        <!-- Book genre -->
        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <option value="" disable selected>Select a genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        </select>
      

        <!-- Book public status -->
        <label for="is_public">Public:</label>
        <input type="checkbox" id="is_public" name="is_public" value="" checked>

        <!-- Submit button -->
        <button type="submit" class="btn mt-4">Add Book</button>
        <a href="" class="btn mt-4">Cancel</a>


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
