<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Poppins Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Page-Specific CSS -->
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Toggle mobile menu
        function toggleMenu() {
            const mobileMenu = document.getElementById('menu-mobile');
            mobileMenu.classList.toggle('show');
        }
    </script>
</body>

</html>