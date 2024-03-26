<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monitoring Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/> --}}
        <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css') }}" rel="stylesheet"/>
        <link rel="shortcut icon" href="{{ URL::asset('img/kai-ico.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            nav {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }
            #map {
                position: relative;
                z-index: 1;
                height: calc(100vh - 80px);
                padding-top: 80px;
            }
            body {
                overflow: hidden;
            }
            .w3-sidebar {
                overflow-y: hidden;
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
    {{-- <script>
        const map = L.map('map').setView([-15.120262020010896, 126.0323199855834], 5);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // const marker = L.marker([51.5, -0.09]).addTo(map)
        //     .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        // const circle = L.circle([51.508, -0.11], {
        //     color: 'red',
        //     fillColor: '#f03',
        //     fillOpacity: 0.5,
        //     radius: 500
        // }).addTo(map).bindPopup('I am a circle.');

        // const polygon = L.polygon([
        //     [51.509, -0.08],
        //     [51.503, -0.06],
        //     [51.51, -0.047]
        // ]).addTo(map).bindPopup('I am a polygon.');


        // const popup = L.popup()
        //     .setLatLng([51.513, -0.09])
        //     .setContent('I am a standalone popup.')
        //     .openOn(map);

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(`You clicked the map at ${e.latlng.toString()}`)
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script> --}}

</html>