<header class="{{ str_contains(url()->current(), "admin") ? "admin-header" : "main-header" }}">
    <h1 class="{{ str_contains(url()->current(), "admin") ? "admin-title" : "main-title" }}">Wingspan&nbsp;&nbsp;API {{ str_contains(url()->current(), "admin") ? "- Admin" : "" }}</h1>
    <nav class="navbar">
        @if(str_contains(url()->current(), "admin"))
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="admin-nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @else
            <ul class="nav">
                <li class="nav-item"><a class="nav-link {{ $active_link === "Home" ? "active" : "" }}" href="{{ route("home.index") }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ $active_link === "About" ? "active" : "" }}" href="{{ route("home.about") }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ $active_link === "Login" ? "active" : "" }}" href="{{ route("login") }}">Log In</a></li>
            </ul>
        @endif
    </nav>
</header>