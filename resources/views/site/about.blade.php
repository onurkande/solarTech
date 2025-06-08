@extends('site.layouts.master')

@section('title', 'Güneş Enerjisi - Hakkımızda')

@section('meta')
    <meta name="description" content="Güneş enerjisi hakkında bilgi almak için buraya tıklayın.">
    <meta name="keywords" content="güneş enerjisi, hakkımızda, güneş paneli, güneş enerjisi hakkında, güneş enerjisi bilgi">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site-assets/css/about.css') }}">
@endsection

@section('content')
    <!-- About Hero Section -->
    <section id="about" class="about-hero">
        <div class="container">
            <div class="about-hero-content fade-in">
                <h1>{{ $about->title }}</h1>
                <div>{!! $about->desc !!}</div>
            </div>
        </div>
    </section>

    <!-- Mission Vision Values Section -->
    <section class="section mvv-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Vakfımız</h2>
                <p>Sürdürülebilir enerji çözümlerine olan bağlılığımızı yönlendiren temel değerler ve ilkeler</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="mvv-card fade-in">
                        <div class="mvv-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>Misyonumuz</h4>
                        <div>{!! $about->mission !!}</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mvv-card fade-in">
                        <div class="mvv-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>Vizyonumuz</h4>
                        <div>{!! $about->vission !!}</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mvv-card fade-in">
                        <div class="mvv-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Değerlerimiz</h4>
                        <div>{!! $about->our_values !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Text Section -->
    <section class="section about-text-section">
        <div class="container">
            <div class="about-text-content fade-in">
                <div>{!! $about->content !!}</div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section timeline-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Bizim Hikayemiz</h2>
                <p>Büyüme, yenilikçilik ve sürdürülebilir enerji çözümlerine bağlılık yolculuğu</p>
            </div>
            <div class="timeline">
                @foreach($aboutStories as $story)
                    <div class="timeline-item {{ $loop->iteration % 2 == 0 ? 'right' : 'left' }} fade-in">
                        <div class="timeline-content">
                            <div class="timeline-year">{{ $story->year }}</div>
                            <div class="timeline-title">{{ $story->title }}</div>
                            <div class="timeline-description">{!! $story->desc !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section partners-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Ortaklarımız & Referanslarımız</h2>
                <p>Güvenilir işbirlikleri ve çeşitli endüstrilerde memnuniyetli müşteriler</p>
            </div>
            <div class="partners-grid fade-in">
                @foreach($aboutReferences as $reference)
                    <a href="{{ $reference->url }}" target="_blank">
                        <div class="partner-logo">
                            <img src="{{ asset('storage/' . $reference->image) }}" alt="Solar Panel Manufacturer">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta-section">
        <div class="container">
            <div class="cta-content fade-in">
                <h2>Bizimle iletişime geçin</h2>
                <p>İlgili alanlara tıklayarak bize ulaşabilirsiniz.</p>
                <a href="{{route('index')}}#contact" class="btn-cta">
                    <i class="fas fa-calendar-check me-2"></i>Randevu Al
                </a>
                <a href="{{route('contact')}}#contact-form" class="btn-cta secondary">
                    <i class="fas fa-phone me-2"></i>İletişime Geç
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('site-assets/js/about.js') }}"></script>
@endsection
