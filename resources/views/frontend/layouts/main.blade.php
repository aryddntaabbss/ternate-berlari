<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ @$title != '' ? "$title - " : '' }}{{ config('app.name') }}</title>

        <meta content="Website Ternate Berlari" name="description">
        <meta content="Ternate Berlari" name="keywords">
        <meta name="author" content="Ternate Berlari">

        <!-- AOS CSS -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


        @vite(['resources/css/app.css','resources/js/app.js'])

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="overflow-x-hidden bg-gray-100">

        @yield('outmain')

        <main>
            @yield('body')
        </main>

        <!-- AOS JS -->
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
    </body>

</html>