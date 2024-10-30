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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Vendor CSS Files -->
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

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
    @yield('head')
</head>

<body class="min-h-screen flex flex-col bg-gray-100 overflow-x-hidden">

    <main class="flex-grow">
        @yield('body')
    </main>

    @include('frontend.layouts.footer')

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('backend/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('backend/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('backend/js/main.js') }}"></script>

    <x-notify::notify />
    @notifyJs


</body>

</html>
