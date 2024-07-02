<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garbage Truck Tracking</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/tracking.css">
</head>
<body>
@extends('admin.home')

@section('content')

<div class="container">
    <h1>Track Garbage Trucks</h1>
    <div class="map-container">
        <div id="map"></div>
        <div class="tracking-info">
            <div class="truck-info">
                <h2>Truck 1</h2>
                <p>Capacity: 1 tonne</p>
                <p>Status: Full</p>
            </div>
            <div class="truck-info">
                <h2>Truck 2</h2>
                <p>Capacity: 1 tonne</p>
                <p>Status: Full</p>
            </div>
            <div class="truck-info">
                <h2>Truck 3</h2>
                <p>Capacity: 1 tonne</p>
                <p>Status: Empty</p>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="credit"> &copy; copyright @
    <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
    <span>Terms and Conditions Apply</span>
    </div>
</footer>

<script>
    // Initialize the map and set its view to Nairobi
    var map = L.map('map').setView([-1.286389, 36.817223], 13);

    // Add a tile layer to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Define the waste disposal site location in Nairobi
    var wasteDisposalSite = L.marker([-1.286389, 36.817223]).addTo(map)
        .bindPopup('Waste Disposal Site')
        .openPopup();

    // Check if the browser supports geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Get the coordinates of the current position
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Add a marker at the current position
            var userMarker = L.marker([lat, lon]).addTo(map)
                .bindPopup('You are here')
                .openPopup();

            // Set the map view to the current position
            map.setView([lat, lon], 13);

            // Add routing from waste disposal site to user's location
            L.Routing.control({
                waypoints: [
                    L.latLng(-1.286389, 36.817223), // Waste disposal site
                    L.latLng(lat, lon) // User's location
                ],
                routeWhileDragging: true,
                createMarker: function() { return null; }, // Disable creation of route markers
                lineOptions: {
                    styles: [{color: 'black', opacity: 1, weight: 2}]
                },
                addWaypoints: false, // Disable adding waypoints
                draggableWaypoints: false, // Disable dragging waypoints
                fitSelectedRoutes: true, // Fit the map view to the route
                showAlternatives: false, // Disable showing alternative routes
                show: false // Disable showing directions
            }).addTo(map);

            // Simulate truck locations
            var trucks = [
                {id: 1, lat: -1.286389, lon: 36.817223},
                {id: 2, lat: -1.276389, lon: 36.827223},
                {id: 3, lat: (lat + -1.286389) / 2, lon: (lon + 36.817223) / 2} // Truck along the route
            ];

            var truckMarkers = {};

            trucks.forEach(function(truck) {
                var marker = L.marker([truck.lat, truck.lon], {
                    icon: L.icon({
                        iconUrl: '/images/truck-icon.jpg', // Correct path to the truck icon
                        iconSize: [32, 32],
                        iconAnchor: [16, 32]
                    })
                }).addTo(map).bindPopup('Garbage Truck ' + truck.id);

                truckMarkers[truck.id] = marker;
            });

            // Simulate truck movement
            setInterval(function() {
                trucks.forEach(function(truck) {
                    var newLat = truck.lat + (Math.random() - 0.5) * 0.01;
                    var newLon = truck.lon + (Math.random() - 0.5) * 0.01;
                    truck.lat = newLat;
                    truck.lon = newLon;

                    truckMarkers[truck.id].setLatLng([newLat, newLon]);
                });
            }, 3000);

        }, function(error) {
            console.error('Geolocation error:', error);
        });
    } else {
        alert('Geolocation is not supported by this browser.');
    }
</script>
@endsection
</body>
</html>
