<div class="container-fluid">
        <div id="map" class="lg:mt-[100px] mt-[50px] lg:w-[2000px] w-full"></div>
        {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> --}}
        <script src="{{ asset('plugins/leaflet/leaflet.js') }}"></script>
        <script src="{{ asset('plugins/leaflet/L.KML.js')}}"></script>
        <script>
            map = L.map('map').setView([-4.198779206119091, 122.29329165271804], 5);
        
            tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        </script>

</div>