<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Garbage Bins</title>
    <link rel="stylesheet" href="/css/garbage_bin_request.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <style>
        .bin-image {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }
    </style>
</head>
<body>
@include ('resident_header')
    <div class="bin-container">
    <h1>Request Garbage Bin</h1>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('garbage_bin_requests.store') }}" method="POST" class="bin-form">
        @csrf
        <div>
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" value="{{ $defaultAddress }}">
        </div>
        <div>
            <label>Select the garbage bins you want:</label>
            <div class="bin-types">
            <div class="type1">
            <input type="checkbox" id="organic_waste" name="organic_waste" value="1">
            <label for="organic_waste"><img class="bin-image" src="/images/organic_waste.png" alt="Organic Waste"><br> Organic Waste</label>
            </div>
            <div class="type2">
            <input type="checkbox" id="recyclable_waste" name="recyclable_waste" value="1">
            <label for="recyclable_waste"><img class="bin-image" src="/images/recyclable_waste.png" alt="Recyclable Waste"> <br> Recyclable Waste</label>
            </div>
            <div class="type3">
            <input type="checkbox" id="non_recyclable_waste" name="non_recyclable_waste" value="1">
            <label for="non_recyclable_waste"><img class="bin-image" src="/images/non-recyclable_waste.png" alt="Non-Recyclable Waste"><br> Non-Recyclable Waste</label>
            </div>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>
    <footer>
    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
    </footer>
</body>
</html>
