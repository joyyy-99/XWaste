
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
    <script>
        // JavaScript to set current date in payment date field
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date().toISOString().slice(0, 10); // Get current date in YYYY-MM-DD format
            document.getElementById('paymentDate').value = currentDate;
        });
    </script>
</head>
<body>
@include ('resident_header')
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
            <label for="subscription">Subscription Plan:</label><br>
            <input type="radio" id="monthly" name="subscription" value="100" {{ $plan === 'monthly' ? 'checked' : '' }} readonly>
            <label for="monthly">100 per month</label><br>
            <input type="radio" id="yearly" name="subscription" value="1099" {{ $plan === 'yearly' ? 'checked' : '' }} readonly>
            <label for="yearly">1099 per year</label>
            
        </div>
        <div>
            <label for="paymentDate">Payment Date:</label>
            <input type="date" id="paymentDate" name="paymentDate" required>
        </div>
        <div>
            <label for="method">Payment Method:</label>
            <select id="method" name="method" required>
                <option value="" disabled selected>Select a payment method</option>
                <option value="card">Pay with Card</option>
                <option value="cash">Pay with Cash</option>
            </select>
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
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>