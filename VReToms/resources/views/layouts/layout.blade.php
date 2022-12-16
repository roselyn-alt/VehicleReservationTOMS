@php
    use App\http\Controller\GlobalDeclare;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vehicle Reservation & Travel Order Management</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <style>
        .card {
            border: 0px !important;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.348);
            padding: 1%;

            background-color: rgb(255, 255, 255, 0.8);
        }
        .card-header {
            background-color: white !important;
        }
        .nav-link:hover {
            background-color: blueviolet;
            transform: 0.5s;
            color: white;
        }
        .btn-purple {
            border: 0px;
            background-color: blueviolet !important;
        }
        .btn-purple:hover {
            background-color: rgb(107, 36, 175) !important;
        }
        .color-purple {
            color: blueviolet;
        }

    </style>
</head>
<body>
    <div id="app">
        {{-- end --}}
    
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
