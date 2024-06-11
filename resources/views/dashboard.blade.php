<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Homepage - XWaste</title>
    <link rel="stylesheet" type="text/css" href="css/resident_page.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <div class="container">
        <div class="card">
            <img src="/Images/household.jpg" alt="Register Household">
            <h2>Register Your Household</h2>
            <p>Register your household to start receiving waste management services.</p>
            <button onclick="window.location.href='/register-household'">Register Now</button>
        </div>
        <div class="card">
            <img src="/Images/garbage_bins.jpg" alt="Get Garbage Bins">
            <h2>Get Garbage Bins</h2>
            <p>Request garbage bins for your household.</p>
            <button onclick="window.location.href='/get-garbage-bins'">Request Bins</button>
        </div>
        <div class="card">
            <img src="/Images/subscribe.jpg" alt="Start a Subscription">
            <h2>Start a Subscription</h2>
            <p>Choose a subscription plan that suits your needs.</p>
            <button onclick="window.location.href='/start-subscription'">Subscribe Now</button>
        </div>
        <div class="card">
            <img src="/Images/schedule.jpg" alt="Scheduling">
            <h2>Scheduling</h2>
            <p>Schedule your waste pickups.</p>
            <button onclick="window.location.href='/scheduling'">Schedule Now</button>
        </div>
        <div class="card">
            <img src="/Images/payment.jpg" alt="Payment">
            <h2>Payment</h2>
            <p>Make payments for your subscription and services.</p>
            <button onclick="window.location.href='/payment'">Make a Payment</button>
        </div>
        <div class="card">
            <img src="/Images/feedback.jpg" alt="Feedback">
            <h2>Feedback</h2>
            <p>We value your feedback. Please let us know how we can improve our services.</p>
            <button onclick="window.location.href='/feedback'">Give Feedback</button>
        </div>
    </div>
    <footer>
    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
    </footer>
</body>
</html>
