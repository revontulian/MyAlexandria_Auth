<x-layout>

    @if ($user->id == Auth::id())
    <h2>My Shelf - Owned Books</h2>
    @else
    <h2>{{ $user->name }}'s Public Library</h2>
    @endif

    <ul>
        @foreach ($books as $book)
        <li>
            <x-card href="{{ route('books.show', $book->id) }}" :highlight="$book['owner_user_id'] == Auth::id()">
                <h3>{{ $book->title }}</h3>
            </x-card>
        </li>
        @endforeach
    </ul>

    {{ $books->links() }}
</x-layout>
