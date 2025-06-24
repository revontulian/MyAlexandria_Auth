<x-layout>
    <h2>Register an account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button type="submit" class="btn mt-4">Register</button>

        <!-- Display validation errors if any -->

</x-layout> 