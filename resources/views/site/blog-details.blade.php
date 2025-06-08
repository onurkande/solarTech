@extends('site.layouts.master')

@section('title', 'Güneş Enerjisi - Blog Detayı')

@section('meta')
    <meta name="description" content="Güneş enerjisi blogu, güneş paneli kurulumu, bakım, yeşil enerji hakkında bilgi almak için buraya tıklayın.">
    <meta name="keywords" content="güneş enerjisi, blog, haberler, güncellemeler, güneş paneli kurulumu, bakım, yeşil enerji">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site-assets/css/blog-details.css') }}">
@endsection

@section('content')
    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="blog-hero-content fade-in">
                <h1>{{ $blog->title }}</h1>
                <p class="blog-subtitle">{!! $blog->desc !!}</p>
                
                <div class="blog-meta">
                    <div class="blog-date">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $blog->created_at->format('d F Y') }}</span>
                    </div>  
                </div>

                <div class="blog-stats">
                    <div class="blog-stat">
                        <i class="fas fa-clock"></i>
                        <span>{{ $blog->reading_time }} dk okuma süresi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="blog-content-section">
        <div class="blog-content-container">
            <div class="blog-content fade-in">
                
                {!! $blog->content !!}

                <div class="social-share">
                    <h4><i class="fas fa-share-alt me-2"></i>Bu Yazıyı Paylaş</h4>
                    <div class="social-share-buttons">
                        <a href="#" class="social-share-btn facebook" onclick="shareOnFacebook()">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-share-btn twitter" onclick="shareOnTwitter()">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-share-btn linkedin" onclick="shareOnLinkedIn()">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-share-btn whatsapp" onclick="shareOnWhatsApp()">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

    
            <!-- Tags Section -->
            <div class="blog-tags fade-in">
                <h4><i class="fas fa-tags me-2"></i>Etiketler</h4>
                <div class="tags-list">
                    @php
                        $tags = explode(',', $blog->tags);
                    @endphp
                    @foreach ($tags as $tag)
                        <a href="#" class="tag">
                            <i class="fas fa-hashtag"></i>{{ trim($tag) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles Section -->
    <section class="related-articles-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Bunları da Okuyun</h2>
                <p>Güneş enerjisi hakkında daha fazla bilgi edinin</p>
            </div>
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="related-article-card fade-in">
                            <div class="related-article-image">
                                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="related-article-content">
                                <a href="{{ route('blog-details', $blog->slug) }}" style="text-decoration: none; color: black; transition: transform 0.3s ease;"><h3 class="related-article-title" style="transition: transform 0.3s ease; display: inline-block;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">{{ $blog->title }}</h3></a>
                                <div class="related-article-meta">
                                    <span><i class="fas fa-calendar me-1"></i>{{ $blog->created_at->format('d F Y') }}</span>
                                    <span><i class="fas fa-clock me-1"></i>{{ $blog->reading_time }} dk okuma süresi</span>
                                </div>
                                <p class="related-article-summary">{!! $blog->desc !!}</p>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="read-more-btn">
                                    <i class="fas fa-arrow-right me-2"></i>Devamını Oku
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog CTA Section -->
    <section class="blog-cta-section">
        <div class="container">
            <div class="blog-cta-content fade-in">
                <div class="blog-cta-icon">
                    <i class="fas fa-solar-panel"></i>
                </div>
                <h2>Solar ile Tasarruf Etmeye Hazır mısınız?</h2>
                <p>Güneş enerjisi hakkında daha fazla bilgi edinin</p>
                <div class="blog-cta-buttons">
                    <a href="{{ route('index') }}#contact" class="btn-cta">
                        <i class="fas fa-calendar-check"></i>
                        Güneş Enerjisi Keşif Talebi
                    </a>
                    <a href="{{ route('contact') }}#contact-form" class="btn-cta secondary">
                        <i class="fas fa-calculator"></i>
                        İletişime Geç
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('site-assets/js/blog-details.js') }}"></script>
@endsection

