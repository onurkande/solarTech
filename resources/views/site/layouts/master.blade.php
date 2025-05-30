<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- Custom CSS -->
    @yield('css')
</head>
<body>
    <!-- Navbar -->
    @include('site.layouts.partials.header')

    @yield('content')

    <!-- Footer -->
    @include('site.layouts.partials.footer')

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/{{$contact->telephone}}" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <span class="float-text">WhatsApp Fiyat Al</span>
    </a>

    <!-- Call Float Button -->
    <a href="tel:{{$contact->telephone}}" class="call-float">
        <i class="fas fa-phone-alt"></i>
        <span class="float-text">Telefon</span>
    </a>

    <!-- Instagram Float Button -->
    <a href="{{$siteSettings->instagram_url}}" class="instagram-float" target="_blank">
        <i class="fab fa-instagram"></i>
        <span class="float-text">Instagram</span>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- Custom JS -->
    @yield('js')
</body>
</html>