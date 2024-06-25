<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" type="text/css" href="/css/payment.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header class="header">
        <div class="logo"><a href="{{ route('dashboard') }}">XWaste</a></div>
        <nav class="nav">
            <a href="{{ route('schedule.create') }}">Scheduling</a>
            <a href="{{ route('household.create') }}">Subscribe</a>
            <a href="{{ route('payment.create') }}">Payment</a>
            <a href="{{ route('feedback.create') }}">Feedback</a>
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
    <div class="confirmation-container">
        <h1>Payment Confirmation</h1>
        <div class="alert alert-success">
            Your payment has been initiated successfully. You will receive an SMS confirmation shortly.
        </div>
        <a href="{{ route('payment.create') }}" class="btn btn-primary">Make Another Payment</a>
    </div>
    <footer>
    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
    </footer>
</body>
</html>
