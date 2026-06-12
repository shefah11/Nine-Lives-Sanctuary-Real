<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nine Lives Sanctuary - @yield('title')</title>
    
    <link rel="stylesheet" href="{{ asset('css/custom-theme.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- NAVIGATION BAR -->
    <nav id="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-text">
                <span>Nine Lives Sanctuary</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/cats">Adoption Gallery</a></li>
            <li><a href="/report/create">Report a Cat</a></li>
            <li><a href="/health">Healthcare Guide</a></li>
            
            @auth
                <li><a href="/profile">Profile</a></li>
                @if(auth()->user()->role === 'admin')
                    <li><a href="/admin/dashboard">Admin</a></li>
                @endif
                <!-- Logout button REMOVED from desktop navbar -->
            @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endauth
        </ul>

        <div class="nav-icons">
            <button class="icon-btn" id="searchBtn" aria-label="Search">
                <i class="fas fa-search"></i>
            </button>
            <button class="icon-btn hamburger-btn" id="hamburgerBtn" aria-label="Menu">
                <i class="fas fa-cat"></i>
            </button>
        </div>
    </nav>

    <!-- MOBILE MENU with LOGIN/LOGOUT/REGISTER -->
    <div class="mobile-nav" id="mobileNav">
        <a href="/">Home</a>
        <a href="/cats">Adoption Gallery</a>
        <a href="/report/create">Report a Cat</a>
        <a href="/health">Healthcare Guide</a>
        
        @auth
            <a href="/profile">Profile</a>
            @if(auth()->user()->role === 'admin')
                <a href="/admin/dashboard">Admin Dashboard</a>
            @endif
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn-mobile">Logout</button>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>

    <!-- SEARCH OVERLAY -->
    <div class="search-overlay" id="searchOverlay">
        <button class="search-close" id="searchClose">✕</button>
        <div class="search-inner">
            <label>Quick Search</label>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search cats, healthcare guides, reports..." />
                <button id="searchSubmit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="search-suggestions">
                <span>Try:</span>
                <div class="search-tag">Home</div>
                <div class="search-tag">Adoption Gallery</div>
                <div class="search-tag">Report-a-Cat</div>
                <div class="search-tag">Healthcare guide</div>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>🐱 &copy; 2026 Nine Lives Sanctuary. Saving lives, one cat at a time. 🐱</p>
        </div>
    </footer>

    <script>
        // Search overlay toggle
        const searchBtn = document.getElementById('searchBtn');
        const searchOverlay = document.getElementById('searchOverlay');
        const searchClose = document.getElementById('searchClose');
        const searchSubmit = document.getElementById('searchSubmit');
        const searchInput = document.getElementById('searchInput');
        
        searchBtn.addEventListener('click', () => {
            searchOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        searchClose.addEventListener('click', () => {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        searchSubmit.addEventListener('click', () => {
            const query = searchInput.value;
            if (query) {
                window.location.href = '/search?q=' + encodeURIComponent(query);
            }
        });
        
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const query = searchInput.value;
                if (query) {
                    window.location.href = '/search?q=' + encodeURIComponent(query);
                }
            }
        });
        
        // Search tags click
        document.querySelectorAll('.search-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                const query = tag.textContent;
                window.location.href = '/search?q=' + encodeURIComponent(query);
            });
        });
        
        // Hamburger menu toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileNav = document.getElementById('mobileNav');
        
        hamburgerBtn.addEventListener('click', () => {
            mobileNav.classList.toggle('active');
            hamburgerBtn.classList.toggle('spin');
        });
        
        // Close mobile menu when clicking a link or logout button
        document.querySelectorAll('.mobile-nav a, .mobile-nav .logout-btn-mobile').forEach(link => {
            link.addEventListener('click', () => {
                mobileNav.classList.remove('active');
                hamburgerBtn.classList.remove('spin');
            });
        });
    </script>

</body>
</html>