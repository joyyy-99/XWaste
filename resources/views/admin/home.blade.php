<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tracking2.css') }}">
    @include('libraries.styles')
</head>
<body>
    <div class="header">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout" class="logout-button">
        </form>
    </div>

<div class="sidebar">
    <button class="sidebar-close" onclick="closeSidebar()" style="margin-bottom: 10px;">
        <i class="fas fa-times"></i>
    </button>
    <h2>Admin Panel</h2>
    
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('payment.index') }}">View Payments</a>
        </li>
        <li>
            <a href="{{ route('subscription.index') }}">View Subscriptions</a>
        </li>
        <li>
            <a href="{{ route('schedule.index') }}">Scheduled Pickups</a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}">Manage Users</a>
        </li>
        <li>
            <a href="{{ route('feedback.index') }}">Feedback</a>
        </li>
        <li>
            <a href="{{ route('employees.index') }}">Employee Registration</a>
        </li>
        <li>
            <a href="{{ route('trucks.index') }}">Truck Registration</a>
        </li>
        <li>
            <a href="{{ route('assignments.index') }}">Truck Assignments</a>
        </li>
        <li>
            <a href="{{ route('tracking.admin.index1') }}">Track Garbage Trucks</a>
        </li>
        <li>
            <a href="{{ route('household.index') }}">View Households</a>
        </li>
        <li>
            <a href="{{ route('garbage_bin_requests.admin.index1') }}">Garbage bins Requested</a>
        </li>
    </ul>
</div>

<button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

    <div class="main-content">
        @yield('content')
    </div>
    @include('libraries.scripts')

<script>
    function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');

    window.addEventListener('resize', function() {
    var width = window.innerWidth;
    var sidebar = document.getElementById('sidebar');

    // Ensure sidebar visibility based on window width
    if (width > 768) {
        sidebar.classList.remove('collapsed'); // Show sidebar on larger screens
    }

});
}

function closeSidebar() {
    var sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('collapsed');
    } else {
        console.error('Sidebar element not found.');
    }
}
</script>
</body>
</html>
