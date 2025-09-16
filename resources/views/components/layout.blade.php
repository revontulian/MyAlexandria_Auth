<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAlexandria App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
        {{ session('success') }}
    </div>
    @endif

    <header class="fixed top-0 left-0 w-full z-50 bg-white shadow">
        <nav>
            <h1>
                <a href="/">MyAlexandria App</a>
            </h1>

            @guest
            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Register</a>
            @endguest

            @auth
            <span class="border-r-2 pr-2">
                @auth
                <span class="username">Hello, {{ auth()->user()->name }}</span>
                @endauth
            </span>

            @php
            $rolesArray = json_decode(auth()->user()->roles, true);
            @endphp

            @if (in_array('admin', $rolesArray))
            <a href="{{ route('users.admin') }}" class="btn">Admin Panel</a>
            @endif

            
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn">Logout</button>
                
            </form>
            @endauth
            
        </nav>
    </header>
    
    <div class="flex pt-18">
        <aside class="fixed w-58 bg-amber-50 min-h-screen p-4">
            @auth
            <h2 class="font-bold mb-2">Options</h2>
            <ul>
                <li class="mb-8"><a href="{{ route('books.index') }}" class="btn">My books</a></li>
                <li class="mb-8"><a href="{{ route('books.add') }}" class="btn">Add a book</a></li>
                <li class="mb-8"><a href="{{ route('books.borrowed') }}" class="btn">My borrowed books</a></li>
                <li class="mb-8"><a href="{{ route('books.lent') }}" class="btn">My lent books</a></li>

            </ul>
            @endauth
        </aside>

        <main class="flex-1 container">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
