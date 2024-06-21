<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Pickup</title>
    <link rel="stylesheet" type="text/css" href="/css/schedule.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
</head>
<body>
    <header class="header">
        <div class="logo"><a href="#">XWaste</a></div>
        <nav class="nav">
            <a href="#">Scheduling</a>
            <a href="#">Subscribe</a>
            <a href="#">Payment</a>
            <a href="#">Feedback</a>
        </nav>
        <div class="right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fa-solid fa-right-to-bracket" style="color: #000000;"></i> Logout
                </button>
            </form>
        </div>
    </header>
    
    <div class="schedule-container">
        <h1>Schedule Pickup</h1>
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <form action="{{ route('schedule.store') }}" method="POST" class="schedule-form">
            @csrf
            <div>
                <label for="pickup_date">Pickup Date:</label>
                <input type="text" id="pickup_date" name="pickup_date" readonly>
                <div class="calendar-container"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <footer>
        <div class="credit">
            &copy; copyright @ <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
            <span>Terms and Conditions Apply</span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
    <script>
        flatpickr('#pickup_date', {
            enableTime: false, // Disable time selection
            dateFormat: 'Y-m-d', // Set date format to 'YYYY-MM-DD'
        });
    </script>
</body>
</html>
