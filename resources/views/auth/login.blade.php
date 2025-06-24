<x-layout>
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="btn mt-4">Login</button>

        <!-- Display validation errors if any -->

</x-layout>
