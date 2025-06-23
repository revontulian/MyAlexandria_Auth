<x-layout>
    <h2>Title: {{ $book->title }}</h2>

    <div class="bg-amber-200 p-4 rounded border border-amber-400">
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Published:</strong> {{ $book->published_date }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Genre:</strong> {{ $book->genre }}</p>
        <p><strong>Public:</strong> {{ $book->is_public ? 'Yes' : 'No' }}</p>
    </div>

</x-layout>