<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/img/icon.png" type="image/png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SND RACING PRODUCT</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">

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

    <a href="https://api.whatsapp.com/send/?phone=6283829050592&text&type=phone_number&app_absent=0"
        class="whatsapp-button" target="_blank">
        <div class="image-container">
            <img src="{{ asset('img/walogo1.png') }}" alt="WhatsApp">
            <p class="overlay-text-logowa">Tanya kami via whatsapp</p>
        </div>
    </a>

    <!-- Scripts -->
    @include('partials.scripts')
    <!-- Scripts End -->
</body>
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .overlay-text-logowa {
        position: absolute;
        top: 50%;
        right: 100%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.7);
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        color: #fff;
        display: none;
        width: auto;
        white-space: nowrap;
    }

    .image-container:hover .overlay-text-logowa {
        display: block;
    }
</style>

</html>
