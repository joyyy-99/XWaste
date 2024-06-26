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
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
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
    <h2>Admin Panel</h2>
    <ul class="sidebar-menu">
        <li>
            <a href="">View Payments</a>
        </li>
        <li>
            <a href="">Schedule Pickups</a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}">Manage Users</a>
        </li>
        <li>
            <a href="">Reports</a>
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
    </ul>
</div>

    <div class="main-content" style="margin-left: 150px; padding: 20px; margin-top: 30px;">
        @yield('content')
    </div>
    @include('libraries.scripts')
</body>
</html>
