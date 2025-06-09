<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @yield('css')

    <link
      rel="icon"
      href="{{ asset('site-assets/favicon.png') }}"
      type="image/x-icon"
    />
</head>
<body>
    @include('site.layouts.partials.header')

    @yield('content')

    <!-- Enhanced Phone Button -->
    <a href="tel:{{$contact->phone}}" class="whatsapp-btn" title="Bizi Arayın">
        <i class="fas fa-phone"></i>
        <span class="whatsapp-btn-text">Hemen Ara</span>
    </a>

    @include('site.layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>