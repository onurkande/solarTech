@extends('site.layouts.master')

@section('title', 'Güneş Enerjisi - Blog')

@section('meta')
    <meta name="description" content="Güneş enerjisi hakkında en son haber ve güncellemeler için blogumuzu okuyun. Güneş paneli kurulumu, bakımı ve yeşil enerjinin faydaları hakkında bilgi edinin.">
    <meta name="keywords" content="güneş enerjisi, blog, haberler, güncellemeler, güneş paneli kurulumu, bakım, yeşil enerji">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site-assets/css/blogs.css') }}">
@endsection

@section('content')
    <!-- Products Hero Section -->
    <section id="products" class="products-hero">
        <div class="container">
            <div class="products-hero-content fade-in">
                <h1><i class="fas fa-solar-panel"></i>Enerji Tasarrufunda En İyisi</h1>
                <p>Lider Güneş Enerjisi olarak evler ve işletmeler için geliştirdiğimiz en son güneş enerjisi çözümleriyle tanışın. Son teknolojimizi keşfedin ve enerji ihtiyaçlarınız için mükemmel sistemi bulun.</p>
                <a href="#products-grid" class="btn-hero">
                    <i class="fas fa-search me-2"></i>Ücretsiz Keşif Talebi
                </a>
            </div>
        </div>
    </section>

    <!-- Products Grid Section -->
    <section id="products-grid" class="section products-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Güneş Enerjisi Ürünlerimiz</h2>
                <p>Maksimum verimlilik ve dayanıklılık için yapılan en iyi güneş enerjisi çözümlerimizden birini seçin</p>
            </div>
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card fade-in">
                            <div class="product-image-container">
                                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="product-main-image" data-product="residential">
                                <div class="product-thumbnails">
                                    @foreach ($blog->images as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text }}" class="product-thumbnail" data-main="{{ asset('storage/' . $image->image) }}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-content">
                                <a href="{{ route('blog-details', $blog->slug) }}" style="text-decoration: none; color: black;"><h3 class="product-name" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">{{ $blog->title }}</h3></a>
                                <p class="product-description">{!! $blog->desc !!}</p>
                               
                                <a href="{{ route('blog-details', $blog->slug) }}" class="product-details-btn">
                                    <i class="fas fa-info-circle me-2"></i>Detayları Gör
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Technical Support CTA Section -->
    <section class="section tech-support-section">
        <div class="container">
            <div class="tech-support-content fade-in">
                <div class="tech-support-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h2>Hangi ürünü seçeceğinizi bilmiyor musunuz?</h2>
                <p>Teknik danışmanlarımızdan ücretsiz destek alın. Uzmanlarımız, özel ihtiyaçlarınıza, bütçenize ve enerji gereksinimlerinize göre mükemmel güneş enerjisi çözümünü seçmenize yardımcı olacaktır.</p>
                <div class="tech-support-buttons">
                    <a href="{{ route('contact') }}#contact-form" class="btn-tech-support">
                        <i class="fas fa-calendar-check"></i>
                        Randevu Al
                    </a>
                    <a href="https://wa.me/{{$contact}}" class="btn-tech-support secondary">
                        <i class="fab fa-whatsapp"></i>
                        WhatsApp Desteği
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Modal -->
    <div class="product-modal" id="productModal">
        <div class="product-modal-content">
            <button class="product-modal-close" id="productModalClose">&times;</button>
            <img src="/placeholder.svg" alt="Product Large View" class="product-modal-image" id="productModalImage">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('site-assets/js/blogs.js') }}"></script>
@endsection
