<header class="admin-header">
    <h1 class="admin-title">Wingspan&nbsp;&nbsp;API - Admin</h1>
    <nav class="navbar">
        <ul class="nav">
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
        </ul>
    </nav>
</header>