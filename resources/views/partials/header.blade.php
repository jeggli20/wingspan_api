<header class="main-header">
    <h1 class="main-title">Wingspan&nbsp;&nbsp;API</h1>
    <nav class="navbar">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link {{ $active_link === "Home" ? "active" : "" }}" href="{{ route("home.index") }}">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ $active_link === "About" ? "active" : "" }}" href="{{ route("about.index") }}">About</a></li>
            <li class="nav-item"><a class="nav-link {{ $active_link === "Login" ? "active" : "" }}" href="{{ route("login") }}">Log In</a></li>
        </ul>
    </nav>
</header>