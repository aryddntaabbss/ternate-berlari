<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ @$title != '' ? "$title - " : '' }}{{ config('app.name') }}</title>

        <meta content="Website Ternate Berlari" name="description">
        <meta content="Ternate Berlari" name="keywords">
        <meta name="author" content="Ternate Berlari">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- AOS CSS -->
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

        @vite(['resources/css/app.css','resources/js/app.js'])

    </head>

    <body class="min-h-screen flex flex-col bg-gray-100 overflow-x-hidden">

        @include('frontend.layouts.header')

        <main class="flex-grow">
            @yield('body')
        </main>

        @include('frontend.layouts.footer')

        <!-- AOS JS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
    </body>

</html>