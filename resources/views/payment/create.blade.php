
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
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
    <div class="payment-container">
    <h1>Make a Payment</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('payment.store') }}" method="POST" class="payment-form">
        @csrf
        <div>
            <label for="phone_number">Phone Number:</label>
            <input type="number" id="phone_number" name="phone_number" required>
        </div>
        <div>
            <label for="subscription">Subscription Plan:</label><br>
            <input type="radio" id="monthly" name="subscription" value="100" required>
            <label for="monthly">100 per month</label><br>
            <input type="radio" id="yearly" name="subscription" value="1099" required>
            <label for="yearly">1099 per year</label>
        </div>
        <div>
            <label for="paymentDate">Payment Date:</label>
            <input type="date" id="paymentDate" name="paymentDate" required>
        </div>
        <div>
            <label for="method">Payment Method:</label>
            <input type="text" id="method" name="method" required>
        </div>
        <button type="submit">Pay</button>
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