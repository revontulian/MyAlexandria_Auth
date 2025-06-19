<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAlexandria App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="text-center px-8 py-12">
    <h1>Welcome to MyAlexandria</h1>
    <p>Click on the button below to see your books!</p>
    <a href="/myshelf" class="btn mt-4 inline-block">
        See my shelf
    </a>

</body>
</html>