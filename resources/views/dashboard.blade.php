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
  @include ('resident_header')
    <div class="container">
        <div class="card">
            <img src="/Images/household.jpg" alt="Register Household">
            <h2>Register Your Household</h2>
            <p>Register your household to start receiving waste management services.</p>
            <a href="{{ route('household.create') }}"><button>Register Now</button></a>
        </div>
        <div class="card">
            <img src="/Images/garbage_bins.jpg" alt="Get Garbage Bins">
            <h2>Get Garbage Bins</h2>
            <p>Request garbage bins for your household.</p>
            <a href="{{ route('garbage_bin_requests.create') }}"><button>Request Bins</button></a>
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
            <a href="{{ route('schedule.create') }}"><button>Schedule Now</button></a>
        </div>
        <div class="card">
            <img src="/Images/payment.jpg" alt="Payment">
            <h2>Payment</h2>
            <p>Make payments for your subscription and services.</p>
            <a href="{{ route('payment.create') }}" class="btn btn-primary">Make Another Payment</a>
            </div>
        </div>
        <div class="card">
            <img src="/Images/feedback.jpg" alt="Feedback">
            <h2>Feedback</h2>
            <p>We value your feedback. Please let us know how we can improve our services.</p>
            <a href="{{ route('feedback.create') }}"><button>Give Feedback</button></a>
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
