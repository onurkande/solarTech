<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="{{asset('storage/'.$siteSettings->logo)}}" alt="SineklikCi Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{route('index')}}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{route('products')}}">Ürünlerimiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('videos') ? 'active' : '' }}" href="{{route('videos')}}">Videolar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-contact {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>