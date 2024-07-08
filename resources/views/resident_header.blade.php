<header class="header">
        <div class="logo"><a href="{{ route('dashboard') }}">XWaste</a></div>
        <nav class="nav">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('schedule.create') }}">Scheduling</a>
            <a href="{{ route('subscription.create') }}">Subscribe</a>
            <a href="{{ route('payment.create') }}">Payment</a>
            <a href="{{ route('feedback.create') }}">Feedback</a>
            <a href="{{ route('tracking.index') }}">Tracking</a>
        </nav>
        <div class="right-buttons">
        <div class="right">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">
            <i class="fa-solid fa-right-to-bracket" style="color: #000000;"></i> Logout
            </button>
            </form>
        </div>
        <button class="menu-button" onclick="toggleDropdownMenu()">
        <i class="fa-solid fa-caret-down" style="color: #000000;"></i>
        </button>
        </div>
        <div class="dropdown-menu">
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('schedule.create') }}">Scheduling</a>
        <a href="{{ route('subscription.create') }}">Subscribe</a>
        <a href="{{ route('payment.create') }}">Payment</a>
        <a href="{{ route('feedback.create') }}">Feedback</a>
        <a href="{{ route('tracking.index') }}">Tracking</a>
    </div>
     </header>