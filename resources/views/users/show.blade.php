<x-layout>
    <h2>Name: {{ $user->name }}</h2>

    <div class="bg-amber-200 p-4 rounded border border-amber-400">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Roles:</strong> {{ implode(', ', json_decode($user->roles, true)) }}</p>
        <div class="mt-4 flex justify-center items-center gap-4">
            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="my-4 w-32">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-full">Delete User</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('users.admin') }}" class="btn">Back to Users List</a>
    </div>

</x-layout>