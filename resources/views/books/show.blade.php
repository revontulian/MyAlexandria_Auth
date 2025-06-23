<x-layout>
    <h2>Title: {{ $book->title }}</h2>

    <div class="bg-amber-200 p-4 rounded border border-amber-400">
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Published:</strong> {{ $book->published_date }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Genre:</strong> {{ $book->genre }}</p>
        <p><strong>Public:</strong> {{ $book->is_public ? 'Yes' : 'No' }}</p>
        <div class="mt-4 flex justify-center items-center gap-4">
            <a href="{{ route('books.edit', $book->id) }}" class="btn my-4 w-32 text-center">Edit Book</a>
            <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="my-4 w-32">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-full">Delete Book</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn">Back to Books List</a>
    </div>

</x-layout>
