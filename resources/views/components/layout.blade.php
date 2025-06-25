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

    <header>
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
                <a href="{{ route('books.add') }}" class="btn">Add a book</a>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn">Logout</button>

                </form>
            @endauth

        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>
</html>
