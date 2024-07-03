<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Household</title>
    <link rel="stylesheet" type="text/css" href="/css/household.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>
<body>
@include ('resident_header')
    <div class="household-container">
    <h1>Register Household</h1>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('household.store') }}" method="POST" class="household-form">
        @csrf
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
            <p>Choose the location on the map (Remember to choose within the bounds of Nairobi)</p>
            <div id="map"></div>
        </div>
        <button type="submit">Register</button>
    </form>
    </div>
    <footer>
    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
    </footer>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script>
        var map = L.map('map').setView([-1.2921, 36.8219], 12); // Nairobi coordinates and zoom level

        // Define Nairobi County bounds
        var bounds = L.latLngBounds(
        L.latLng(-1.3178, 36.6554), // South West corner of Nairobi
        L.latLng(-1.1616, 36.9646)  // North East corner of Nairobi
        );

        // Set maxBounds to restrict the map view to Nairobi County
        map.setMaxBounds(bounds);
        map.on('drag', function() {
            map.panInsideBounds(bounds, { animate: false });
        });

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var marker;

        // Event listener for clicking on the map
        map.on('click', function(e) {
            var lat = e.latlng.lat.toFixed(6); // Latitude of clicked point
            var lng = e.latlng.lng.toFixed(6); // Longitude of clicked point

            // Reverse geocode the coordinates to get the address
        fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng)
            .then(response => response.json())
            .then(data => {
                var address = data.display_name; // Address from reverse geocoding
                document.getElementById('location').value = address; // Set input field value with address
            })
            .catch(error => {
                console.error('Error:', error);
            });

            // Remove previous marker if exists
            if (marker) {
                map.removeLayer(marker);
            }

            // Add marker to the clicked position
            marker = L.marker([lat, lng]).addTo(map)
        });
    </script>
</body>
</html>
