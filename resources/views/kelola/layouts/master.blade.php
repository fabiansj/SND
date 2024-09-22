{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kelola Produk')</title>
    <link rel="stylesheet" href="{{ asset('css/kelola_style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('kelola.partials.sidebar')
        
        <!-- Page Content -->
        <div id="content">
            <!-- Navbar -->
            @include('kelola.partials.header')
            
            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('kelola.partials.footer')
        </div>
    </div>
    <script src="{{ asset('js/kelola_scripts.js') }}"></script>
    @stack('scripts')
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kelola Produk')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/kelola_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('kelola.partials.sidebar')
    <div class="content" id="content">
        @yield('content')
    </div>
    
    <script>        
        $(document).ready(function(){
            $("#menu-button").click(function(){
                var sidebar = $("#sidebar");
                var content = $(".content");
                var navbar = $("#navbar");

                sidebar.toggleClass("collapsed");
                content.css("margin-left", sidebar.hasClass("collapsed") ? "60px" : "250px");
                navbar.css("margin-left", sidebar.hasClass("collapsed") ? "60px" : "250px");
            });

            $("#account-button").click(function(){
                $("#account-dropdown").toggle(); // Menampilkan atau menyembunyikan dropdown
            });

            // Menutup dropdown jika klik di luar dropdown
            $(document).click(function(event) {
                if (!$(event.target).closest("#account-button, #account-dropdown").length) {
                    $("#account-dropdown").hide(); // Menyembunyikan dropdown
                }
            });
        });
    </script>

</body>
</html>
