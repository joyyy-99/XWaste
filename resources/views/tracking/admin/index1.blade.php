@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Track Garbage Trucks</h3>
<div class="row">
<div class="col-md-2">
    </div>
    <div class="col-md-10">

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

<script>
    // Initialize the map and set its view to Nairobi
    var map = L.map('map').setView([-1.286389, 36.817223], 13);

    // Add a tile layer to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    

    // Check if the browser supports geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Get the coordinates of the current position
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Add a marker at the current position
            var userMarker = L.marker([lat, lon]).addTo(map)
                .bindPopup('Waste disposal')
                .openPopup();

            // Set the map view to the current position
            map.setView([lat, lon], 13);

            // Add routing from waste disposal site to user's location
            L.Routing.control({
                waypoints: [
                   
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

@push('css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }

        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: white;
            color: #292929; 
        }

        .bi-trash-fill {
            color: red;
            font-size: 18px;
        }

        .bi-pencil {
            color: green;
            font-size: 18px;
            margin-left: 20px;
        }

        .btn.btn-info {
            background-color: #292929;
            color: white;
            padding: 7px;
            border-radius: 0.5rem;
            border-style: hidden;
        }

        .btn.btn-info:hover {
            background-color: grey;
        }

        
    </style>
@endpush
