<div class="container-fluid">
    <div id="map" class="lg:mt-[100px] mt-[50px] lg:w-[2000px] w-full"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const stations = @json($stations);
        const devices = @json($devices);
        
        var map = L.map('map').setView([-4.628757657193269, 122.33816943962901], 5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        stations.forEach(station => {
            var lat = station.latitude;
            var long = station.longitude;
            
            var stationIcon = L.icon({
                iconUrl: '{{ URL::asset('img/railway.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });

            var marker = L.marker([lat, long], {icon: stationIcon}).addTo(map);
            var popupContent = `
                <b>Name:</b> ${station.name}<br>
                <b>Code:</b> ${station.code}<br>
                <b>Altitude:</b> ${station.altitude}<br>
                <b>Point:</b> ${station.latitude},${station.longitude}<br>
            `;
            marker.on('mouseover', function(e) {
                this.bindPopup(popupContent).openPopup();
            });
            marker.on('mouseout', function(e) {
                this.closePopup();
            });
        });

        devices.forEach(device => {
            var device_lat = device.latitude;
            var device_long = device.longitude;
            var deviceIcon = L.icon({
                iconUrl: '{{ URL::asset('img/train.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });
            var marker = L.marker([device_lat, device_long], {icon: deviceIcon}).addTo(map);
            var popupContent = `
                <b>Serial Number:</b> ${device.serial_number}<br>
                <b>Name:</b> ${device.name}<br>
                <b>Code:</b> ${device.code}<br>
                <b>Last Location:</b> ${device.latitude},${device.longitude}<br>
            `;
            marker.on('mouseover', function(e) {
                this.bindPopup(popupContent).openPopup();
            });
            marker.on('mouseout', function(e) {
                this.closePopup();
            });
            
        });
    </script>
    <script>
        window.onload = function() {
            window.Echo.channel('test-channel')
                .listen('testbroadcast', (data) => {
                    console.log('Message received:', data.data);
                });
        };
    </script>
</div>