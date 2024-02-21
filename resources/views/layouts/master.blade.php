<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kopi Kenangan Senja</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

        @include('partials.styles')
    </head>
    <body>        
        <!-- Navbar Start -->
        @include('partials.header')
        <!-- Navbar End -->

        <!-- Content -->
        <main class="container mt-5">
        @yield('content')
        </main>
        <!-- Content End -->       

        <!-- Footer -->
        @include('partials.footer')
        <!-- Footer End -->

        <!-- Footer -->
        @include('partials.modalbox')
        <!-- Footer End -->

        <!-- Scripts -->
        @include('partials.scripts')            
        <!-- Scripts End -->
    </body>
</html>
