<div class="container">
  @section('title', 'Dashboard')
  <div id="map" class="lg:mt-[100px] mt-[50px] lg:w-[2000px] w-full"></div>
</div>

@push('script')
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

    function getIcon(iconUrl, zoom) {
      var iconSize = 60; // default size
      if (zoom < 10) iconSize = 30;
      else if (zoom < 15) iconSize = 20;

      return L.icon({
        iconUrl: iconUrl,
        iconSize: [iconSize, iconSize],
        iconAnchor: [iconSize / 2, iconSize],
        popupAnchor: [0, -iconSize / 2]
      });
    }

    function addStationMarkers() {
      stations.forEach(station => {
        var lat = station.latitude;
        var long = station.longitude;

        var stationIcon = getIcon('{{ URL::asset('img/station.png') }}', map.getZoom());

        var marker = L.marker([lat, long], {
          icon: stationIcon
        }).addTo(mapLayerGroup);
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
    }

    function addDeviceMarkers() {
      devices.forEach(device => {
        var latitude = parseFloat(device.latitude);
        var longitude = parseFloat(device.longitude);

        var deviceIcon = getIcon('{{ URL::asset('img/train.png') }}', map.getZoom());

        var imageUrl = device.train_profile && device.train_profile.image
          ? `/storage/${device.train_profile.image}`
          : '';

        var popupContent = `
          <b>Name:</b> ${device.train_profile ? device.train_profile.name : 'N/A'}<br>
          <b>Serial Number:</b> ${device.serial_number}<br>
          <b>Code:</b> ${device.code}<br>
          <b>Last Location:</b> ${latitude},${longitude}<br>
          ${imageUrl ? `<img src="${imageUrl}" width="100" /><br>` : ''}
          <a href="/table/detail/${device.serial_number}" target="_blank">Detail</a>
        `;

        var marker = L.marker([latitude, longitude], {
          icon: deviceIcon,
          device_id: device.serial_number
        }).bindPopup(popupContent, { closeOnClick: false, autoClose: false })
          .on('mouseover', function(e) {
            this.openPopup();
          })
          .on('mouseout', function(e) {
            // Check if the mouse is still over the popup
            var popup = this.getPopup();
            if (!popup.isOpen()) {
              this.closePopup();
            }
          });

        marker.addTo(markerLayerGroup);
      });
    }


    function updateMarkerIcons() {
      mapLayerGroup.eachLayer(function(layer) {
        var iconUrl = '{{ URL::asset('img/station.png') }}';
        if (layer.options.device_id) {
          iconUrl = '{{ URL::asset('img/train.png') }}';
        }
        var newIcon = getIcon(iconUrl, map.getZoom());
        layer.setIcon(newIcon);
      });
    }

    map.on('zoomend', function() {
      updateMarkerIcons();
    });

    addStationMarkers();
    addDeviceMarkers();


    function addOrUpdateMarkerFromBroadcast(device) {
      var deviceIcon = getIcon('{{ URL::asset('img/train.png') }}', map.getZoom());

      var popupContent = `
        <b>Serial Number:</b> ${device.device_id}<br>
        <b>Last Location:</b> ${device.latitude},${device.longitude}<br>
        <a href="/table/detail/${device.device_id}" target="_blank">Detail</a>
      `;

      var existingMarker = markerLayerGroup.getLayers().find(marker => marker.options.device_id === device.device_id);

      if (existingMarker) {
        existingMarker.setLatLng([device.latitude, device.longitude]);
        existingMarker.getPopup().setContent(popupContent);
        existingMarker.setIcon(deviceIcon); // update icon size
      } else {
        var newMarker = L.marker([device.latitude, device.longitude], {
          icon: deviceIcon,
          device_id: device.device_id
        }).bindPopup(popupContent, { closeOnClick: false, autoClose: false })
          .on('mouseover', function(e) {
            this.openPopup();
          })
          .on('mouseout', function(e) {
            var popup = this.getPopup();
            if (!popup.isOpen()) {
              this.closePopup();
            }
          });

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
@endpush