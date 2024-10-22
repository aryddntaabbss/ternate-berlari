<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ @$title != '' ? "$title - " : '' }}{{ config('app.name') }}</title>

        <meta content="Website Ternate Berlari" name="description">
        <meta content="Ternate Berlari" name="keywords">
        <meta name="author" content="Ternate Berlari">

        @vite(['resources/css/app.css','resources/js/app.js'])

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-50">

        @yield('outmain')

        <main class="mx-auto">
            @yield('body')
        </main>

    </body>

</html>