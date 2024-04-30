<div class="container">
    <div id="map" class="lg:mt-[100px] mt-[50px] lg:w-[2000px] w-full"></div>
    <script src="{{ URL::asset('js/leaflet.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const stations = @json($stations);
        const devices = @json($devices);

        var map = L.map('map').setView([-7.000576569450258, 107.17740302365186], 9);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    
        var mapLayerGroup = L.layerGroup().addTo(map);
        var markerLayerGroup = L.layerGroup().addTo(map);
    
        stations.forEach(station => {
            var lat = station.latitude;
            var long = station.longitude;
            
            var stationIcon = L.icon({
                iconUrl: '{{ URL::asset('img/railway.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });
    
            var marker = L.marker([lat, long], {icon: stationIcon}).addTo(mapLayerGroup);
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
            var latitude = parseFloat(device.latitude);
            var longitude = parseFloat(device.longitude);
    
            var deviceIcon = L.icon({
                iconUrl: '{{ URL::asset('img/train.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });
            
            var popupContent = `
                <b>Serial Number:</b> ${device.serial_number}<br>
                <b>Name:</b> ${device.name}<br>
                <b>Code:</b> ${device.code}<br>
                <b>Last Location:</b> ${latitude},${longitude}<br>
                <a href="/table/detail/${device.serial_number}">Detail</a>
            `;
    
            var marker = L.marker([latitude, longitude], { icon: deviceIcon, device_id: device.serial_number }).bindPopup(popupContent);
            marker.addTo(markerLayerGroup);
        });

        function addOrUpdateMarkerFromBroadcast(device) {
            var deviceIcon = L.icon({
                iconUrl: '{{ URL::asset('img/train.svg') }}',
                iconSize: [50, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });
    
            var popupContent = `
                <b>Serial Number:</b> ${device.device_id}<br>
                <b>Last Location:</b> ${device.latitude},${device.longitude}<br>
                <a href="/table/detail/${device.device_id}">Detail</a>
            `;
            
            var existingMarker = markerLayerGroup.getLayers().find(marker => marker.options.device_id === device.device_id);
    
            if (existingMarker) {
                existingMarker.setLatLng([device.longitude, device.latitude]);
                existingMarker.getPopup().setContent(popupContent);
            } else {
                var newMarker = L.marker([device.longitude, device.latitude], { icon: deviceIcon, device_id: device.device_id }).bindPopup(popupContent);
                newMarker.addTo(markerLayerGroup);
            }
        }
    
        window.onload = function() {
            window.Echo.channel('location-channel')
            .listen('DeviceLocationBroadcast', (data) => {
                    var device = data.data;
                    addOrUpdateMarkerFromBroadcast(device);
                });
        };
    </script>
</div>