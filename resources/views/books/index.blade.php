<x-layout>

    <h2>My Shelf</h2>

    <ul>
        @foreach ($books as $book)
        <li>
            <x-card href="{{ route('books.show', $book->id) }}" :highlight="true">
                <h3>{{ $book->title }}</h3>
            </x-card>
        </li>
        @endforeach
    </ul>

    {{ $books->links() }}
</x-layout>