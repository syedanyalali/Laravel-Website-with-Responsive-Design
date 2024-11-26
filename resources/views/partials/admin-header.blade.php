<header>
    <nav class="navbar">
        <div class="logo">
            <a href="#"><img src="{{ asset('images/store-of-gems.png') }}" alt="Store of Gems"></a>
        </div>

        <!-- Hamburger Menu Icon -->
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Mobile Menu -->
        <div class="menu-mobile" id="menu-mobile">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('products') }}">Products</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </nav>
    <div class="banner">
        <h1>Admin Panel</h1>
    </div>
</header>