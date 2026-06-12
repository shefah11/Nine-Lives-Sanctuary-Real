<nav class="navbar">
    <div class="container">
        <div class="logo">
            <a href="/">🐱 Nine Lives Sanctuary</a>
        </div>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/cats">Adoption Gallery</a></li>
            <li><a href="/report/create">Report a Cat</a></li>
            <li><a href="/health">Healthcare Guide</a></li>
            @auth
                <li><a href="/user/profile">Profile</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>