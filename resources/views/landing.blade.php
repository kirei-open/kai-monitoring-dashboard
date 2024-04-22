<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monitoring Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css') }}"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <link rel="shortcut icon" href="{{ URL::asset('img/kai-ico.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Cabin&family=DM+Sans:opsz@9..40&family=Poppins&display=swap" rel="stylesheet" />
        <style>
            #map {
                position: fixed;
                height: 1000px;
                padding-top: 20px;
            }
            
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased" id="main">
        <livewire:navbar-component />               
        <livewire:maps-component />
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>