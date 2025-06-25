<x-layout>
    <h2>Registered users</h2>

    <ul>
        @foreach ($users as $user)
        <li>
            <x-card href="{{ route('users.show', $user->id) }}" :highlight="true">
                <h3>{{ $user->name }}</h3>
                <p>Roles: {{ implode(', ', json_decode($user->roles, true)) }}</p>
                <form method="POST" action="{{ route('users.makeAdmin', $user->id) }}" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-primary">Make Admin</button>
                </form>
            </x-card>
        </li>
        @endforeach
    </ul>

</x-layout>
