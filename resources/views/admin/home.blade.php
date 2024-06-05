<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @include('libraries.styles')
</head>
<body>
    <div class="header">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout" class="logout-button">
        </form>
    </div>
    @include('layouts.sidebar')
    <div class="main-content" style="margin-left: 250px; padding: 20px; margin-top: 60px;">
        @yield('content')
    </div>
    @include('libraries.scripts')
</body>
</html>
