<header class="admin-header">
    <h1>Wingspan&nbsp;&nbsp;API</h1>
    <nav class="navbar">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link {{ $active_link === "Home" ? "active" : "" }}" href="{{ route("home.index") }}">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ $active_link === "About" ? "active" : "" }}" href="{{ route("about.index") }}">About</a></li>
            <li class="nav-item"><a class="nav-link {{ $active_link === "Login" ? "active" : "" }}" href="">Log Out</a></li>
        </ul>
    </nav>
</header>