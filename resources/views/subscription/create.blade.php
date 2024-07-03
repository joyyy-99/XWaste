<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subscription</title>
    <link rel="stylesheet" type="text/css" href="/css/subscription.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
@include ('resident_header')
    <div class="container">
        <div class="subscription-container">
            <h1>Create Subscription</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('subscription.store') }}" method="POST" class="subscription-form">
                @csrf
                <div class="form-group">
                    <label for="plan">Subscription Plan</label>
                    <select id="plan" name="plan" required>
                        <option value="monthly">Monthly - 100 KSH</option>
                        <option value="yearly">Yearly - 1099 KSH</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date" required>

                    <p style="padding-top: 10px;">(You will be redirected to the Payment page after subscribing)</p>
                </div>
                <button type="submit" class="btn btn-primary">Create Subscription</button>
            </form>
        </div>
    </div>
    <footer>
    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Joy Awino & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
    </footer>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const planSelect = document.getElementById('plan');
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        // Set start date to today's date
        const today = new Date().toISOString().split('T')[0];
        startDateInput.value = today;

        // Calculate end date based on plan selection
        planSelect.addEventListener('change', function () {
            const selectedPlan = planSelect.value;
            let endDate = new Date(today);

            if (selectedPlan === 'monthly') {
                endDate.setMonth(endDate.getMonth() + 1);
            } else if (selectedPlan === 'yearly') {
                endDate.setFullYear(endDate.getFullYear() + 1);
            }

            endDateInput.value = endDate.toISOString().split('T')[0];
        });

        // Trigger change event to set initial end date
        planSelect.dispatchEvent(new Event('change'));
    });
</script>
</body>
</html>
