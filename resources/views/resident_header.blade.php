<header class="header">
        <div class="logo"><a href="{{ route('dashboard') }}">XWaste</a></div>
        <nav class="nav">
            <a href="{{ route('schedule.create') }}">Scheduling</a>
            <a href="#">Subscribe</a>
            <a href="#">Payment</a>
            <a href="{{ route('feedback.create') }}">Feedback</a>
            <a href="#">Tracking</a>
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