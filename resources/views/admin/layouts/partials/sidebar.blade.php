<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
    <a href="{{route('admin.dashboard')}}" class="logo">
        <img
        src="{{ asset('admin-assets/assets/img/kaiadmin/logo_light.svg') }}"
        alt="navbar brand"
        class="navbar-brand"
        height="20"
        />
    </a>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
        <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
        <i class="gg-menu-left"></i>
        </button>
    </div>
    <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
    </button>
    </div>
    <!-- End Logo Header -->
</div>
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
    <ul class="nav nav-secondary">
        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home"></i>
                <p>Anasayfa</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
            <a href="{{ route('admin.sliders.index') }}">
                <i class="fas fa-images"></i>
                <p>Slider</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
            <a data-bs-toggle="collapse" href="#features">
                <i class="fas fa-concierge-bell"></i>
                <p>Özellikler</p>
                <span class="caret"></span>
            </a>
            <div class="collapse {{ request()->routeIs('admin.features.*') ? 'show' : '' }}" id="features">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="{{ route('admin.features.create') }}" class="{{ request()->routeIs('admin.features.create') ? 'active' : '' }}">
                        <span class="sub-item">Özellik Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.features.index') }}" class="{{ request()->routeIs('admin.features.index') ? 'active' : '' }}">
                        <span class="sub-item">Özellikler</span>
                        </a>

                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <a href="{{ route('admin.about.index') }}">
                <i class="fas fa-info-circle"></i>
                <p>Hakkımızda</p>
            </a>
        </li>

       <li class="nav-item {{ request()->routeIs('admin.about.stories.*') ? 'active' : '' }}">
            <a href="{{ route('admin.about.stories.index') }}">
                <i class="fas fa-info-circle"></i>
                <p>Hakkımızda Hikayeleri</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.about.references.*') ? 'active' : '' }}">
            <a href="{{ route('admin.about.references.index') }}">
                <i class="fas fa-info-circle"></i>
                <p>Hakkımızda Referansları</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.about.images.*') ? 'active' : '' }}">
            <a href="{{ route('admin.about.images.index') }}">
                <i class="fas fa-info-circle"></i>
                <p>Hakkımızda Görselleri</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.video.*') ? 'active' : '' }}">
            <a href="{{ route('admin.video.index') }}">
                <i class="fas fa-video"></i>
                <p>Video</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
            <a href="{{ route('admin.blogs.index') }}">
                <i class="fas fa-newspaper"></i>
                <p>Ürünler</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
            <a href="{{ route('admin.contact.index') }}">
                <i class="fas fa-phone"></i>
                <p>İletişim</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}">
                <i class="fas fa-envelope"></i>
                <p>Mesajlar</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cog"></i>
                <p>Ayarlar</p>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('admin.emails.*') ? 'active' : '' }}">
            <a href="{{ route('admin.emails.index') }}">
                <i class="fas fa-envelope"></i>
                <p>Email Adresleri</p>
            </a>
        </li>
        


    </ul>
    </div>
</div>
</div>
<!-- End Sidebar -->