<header>
  <nav class="navbar">
    <div class="logo">
      <a href="{{ route('home') }}"><img src="{{ asset('images/store-of-gems.png') }}" alt="Store of Gems"></a>
    </div>

    <!-- Desktop Menu -->
    <div class="menu">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('products') }}">Products</a>
      <a href="{{ route('contact') }}">Contact</a>
    </div>

    <div class="search">
      <form action="{{ route('search') }}" method="GET">
        <input type="search" name="query" placeholder="Search here..." value="{{ request('query') }}">
        <button type="submit">
          <img src="{{ asset('images/search.svg') }}" alt="Search">
        </button>
      </form>
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
</header>