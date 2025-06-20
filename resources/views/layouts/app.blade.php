<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('tailadmin/build/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="{{ asset('tailadmin/build/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <style>
        body {
           .kanit-regular {
            font-family: "Kanit", sans-serif;
            font-weight: 400;
            font-style: normal;
            }
        }
    </style>
    @stack('css')
</head>
<body 
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))":class="{'dark bg-gray-900': darkMode === true}">
    @yield('content')
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('tailadmin/build/bundle.js') }}"></script>
    
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js')}} "></script>
    
    @include('Event.auth_event')
    @include('Event.notification_event')
    @stack('js')
</body>
</html>
