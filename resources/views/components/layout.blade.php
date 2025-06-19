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
            <h1>MyAlexandria App</h1>

            <a href="/">Home</a>
            <a href="{{ route('books.index') }}">My Shelf</a>
            <a href="{{ route('books.add') }}">Add a book</a>

        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>
</html>