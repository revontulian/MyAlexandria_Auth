<x-layout>

    <h2>Registered Shelves</h2>

    <ul>
        @foreach ($users as $user)
            <li>
                <x-card href="{{ route('books.shelf', ['id' => $user->id]) }}">
                   <h3> {{ $user->name }}'s shelf </h3>
                </x-card>
            </li>
        @endforeach
    </ul>
    
</x-layout>
