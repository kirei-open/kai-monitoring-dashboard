<div class="container">
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
            marker.bindPopup(popupContent);
        });

        var deviceMarkers = {};

        devices.forEach(device => {
            addOrUpdateDeviceMarker(device);
        });

        function addOrUpdateDeviceMarker(device) {
            var deviceIcon = L.icon({
                iconUrl: '{{ URL::asset('img/train.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });

            var popupContent = `
                <b>Serial Number:</b> ${device.device_id}<br>
                <b>Last Location:</b> ${device.latitude},${device.longitude}<br>
            `;

            if (deviceMarkers[device.device_id]) {
                deviceMarkers[device.device_id].setLatLng([device.latitude, device.longitude]).setPopupContent(popupContent);
            } else {
                var marker = L.marker([device.latitude, device.longitude], {icon: deviceIcon}).addTo(map).bindPopup(popupContent);
                deviceMarkers[device.device_id] = marker;
            }
        }
        window.onload = function() {
            window.Echo.channel('location-channel')
                .listen('DeviceLocationBroadcast', (data) => {
                    var device = data.data;
                    addOrUpdateDeviceMarker(device);
                });
        };
    </script>
</div>

