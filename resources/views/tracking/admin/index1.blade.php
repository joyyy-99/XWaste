@extends('admin.home')

@section('content')

<div class="container">
    <h3 align="center" class="mt-5">Track Garbage Trucks</h3>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="map-container">
                <div id="map" style="height: 500px;"></div>
                <div class="tracking-info">
                    @foreach ($trucks as $truck)
                    <div class="truck-info">
                        <h2>Truck {{ $truck->id }}</h2>
                        <p>Name: {{ $truck->name }}</p>
                        <p>Model: {{ $truck->model }}</p>
                        <p>Registration Number: {{ $truck->registration_number }}</p>
                    </div>
                    @endforeach
                </div>
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

    var truckMarkers = {};

    // Function to add truck markers to the map
    function addTruckToMap(truck) {
        var marker = L.marker([truck.lat || -1.286389, truck.lon || 36.817223], {
            icon: L.icon({
                iconUrl: '/images/truck-icon.jpg',
                iconSize: [32, 32],
                iconAnchor: [16, 32]
            })
        }).addTo(map).bindPopup('Garbage Truck ' + truck.id);

        truckMarkers[truck.id] = marker;
    }

    // Add existing truck data to the map
    @foreach ($trucks as $truck)
        addTruckToMap(@json($truck));
    @endforeach

    // Check if the browser supports geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Get the coordinates of the current position
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Add a marker at the current position
            var userMarker = L.marker([lat, lon], {
                icon: L.icon({
                    iconUrl: '/images/waste-disposal-icon.png', // Adjust the path to your waste disposal icon
                    iconSize: [32, 32],
                    iconAnchor: [16, 32]
                })
            }).addTo(map).bindPopup('Waste disposal').openPopup();

            // Set the map view to the current position
            map.setView([lat, lon], 13);

            // Simulate truck movement
            setInterval(function() {
                @foreach ($trucks as $truck)
                    var truck = @json($truck);
                    if (truckMarkers[truck.id]) {
                        var newLat = truckMarkers[truck.id].getLatLng().lat + (Math.random() - 0.5) * 0.01;
                        var newLon = truckMarkers[truck.id].getLatLng().lng + (Math.random() - 0.5) * 0.01;
                        truckMarkers[truck.id].setLatLng([newLat, newLon]);
                    }
                @endforeach
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
