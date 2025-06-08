<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{route('index')}}">
            @if ($settings->logo)
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" class="navbar-logo me-2" style="height:60px; width:auto;">
            @else
                <span class="navbar-brand-text">Lider Güneş Enerjisi</span>
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{route('index')}}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs') ? 'active' : '' }}" href="{{route('blogs')}}">Ürünlerimiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">İletişim</a>
                </li>
            </ul>
            <a href="{{route('contact')}}#contact-form" class="btn-navbar-cta ms-lg-4 mt-3 mt-lg-0">Teklif Al</a>
        </div>
    </div>
</nav>