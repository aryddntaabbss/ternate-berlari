<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ @$title != '' ? "$title - " : '' }} {{ $websiteTitle }}</title>

        {{-- --}}
        <meta content="{!! $websiteDeskripsi !!}" name="description">
        <meta content="{{ $websiteKeyword }}" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('storage/' . $websiteLogo) }}" rel="icon">
        <link href="{{ asset('storage/' . $websiteLogo) }}" rel="apple-touch-icon">
        <meta name="author" content="TongIt">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        @vite(['resources/css/app.css','resources/js/app.js'])

        @notifyCss
        <style>
            .notify {
                position: fixed;
                /* Ensure it is fixed */
                top: 20px;
                /* Adjust as needed */
                right: 20px;
                /* Adjust as needed */
                z-index: 9999;
                /* Make sure this is a high value */
            }
        </style>
    </head>

    <body class="min-h-screen flex flex-col bg-gray-100 overflow-x-hidden">

        @include('frontend.layouts.header')

        <main class="flex-grow">
            @yield('body')
        </main>

        @include('frontend.layouts.footer')

        <script src="https://cdn.tailwindcss.com"></script>

        <x-notify::notify />
        @notifyJs
    </body>

</html>