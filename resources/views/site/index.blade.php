@extends('site.layouts.master')

@section('title', 'Güneş Enerjisi - Güneş Enerjisi ile Tasarruf Etmeye Başlayın')

@section('meta')
    <meta name="description" content="Lider Güneş Enerjisi, güneş enerjisi çözümlerinde lider bir sağlayıcıdır. Tasarruf etmenize ve karbon ayak izinizi azaltmanıza yardımcı olacak çeşitli ürün ve hizmetler sunuyoruz.">
    <meta name="keywords" content="güneş enerjisi, enerji, tasarruf, kurulum, bakım, danışmanlık">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site-assets/css/index.css') }}">
    <style>
        @foreach($sliderImages as $index => $image)
        .hero-slide:nth-child({{ $index + 1 }}) {
            background-image: linear-gradient(
                {{ 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 0.7)' }},
                {{ 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ', 0.7)' }}
            ),
            url("{{ asset('storage/' . $image->image) }}");
        }
        @endforeach
    </style>
@endsection

@section('content')
    <!-- Hero Slider Section -->
    <section id="home" class="hero-slider">
        @foreach($sliderImages as $index => $image)
        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
            <div class="hero-content">
                <h1>{{ $sliderSettings->title }}</h1>
                <p>{!! $sliderSettings->content !!}</p>
                @if($sliderSettings->button_text)
                <a href="#contact" class="btn-hero">
                    <i class="fas fa-calendar-check me-2"></i>{{ $sliderSettings->button_text }}
                </a>
                @endif
            </div>
        </div>
        @endforeach
        
        <div class="slider-nav">
            @foreach($sliderImages as $index => $image)
            <div class="slider-dot {{ $index === 0 ? 'active' : '' }}" onclick="currentSlide({{ $index + 1 }})"></div>
            @endforeach
        </div>
    </section>

    <!-- Enhanced Why Solar Energy Section -->
    <section id="advantages" class="section advantages-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>{{ $featureSettings->title }}</h2>
                <p>{!! $featureSettings->content !!}</p>
            </div>
            <div class="row g-4">
                @foreach ($features as $feature)
                    <div class="col-lg-3 col-md-6">
                        <div class="advantage-card fade-in">
                            <div class="advantage-svg-icon">
                                <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title }}" />
                            </div>
                            <h4>{{ $feature->title }}</h4>
                            <p>{!! $feature->content !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced About Us Section -->
    <section id="about" class="section about-section">
        <div class="container">
            <div class="row about-content">
                <div class="col-lg-6 fade-in d-flex flex-column justify-content-center">
                    <h3>{{ $about->title }}</h3>
                    <div class="about-summary">{!! $about->desc !!}</div>
                    <ul class="about-features">
                        <li><i class="fas fa-check-circle"></i> <strong>Sertifikalı Profesyonel Ekip</strong></li>
                        <li><i class="fas fa-award"></i> <strong>25 Yıllık Garanti</strong></li>
                        <li><i class="fas fa-tools"></i> <strong>Tamamen Yüklenir</strong></li>
                        <li><i class="fas fa-headset"></i> <strong>24/7 Müşteri Desteği</strong></li>
                        <li><i class="fas fa-chart-line"></i> <strong>Akıllı İzleme Sistemleri</strong></li>
                        <li><i class="fas fa-shield-alt"></i> <strong>Tamamen Sigortalı</strong></li>
                    </ul>
                    <p>Başarıyla <strong>2.500'den fazla kurulum</strong> gerçekleştirdik ve müşterilerimizin çevresel etkilerini azaltırken <strong>elektrik maliyetlerinden milyonlarca tasarruf</strong> etmelerine yardımcı olduk.</p>
                </div>
                <div class="col-lg-6 fade-in d-flex align-items-center">
                    <div class="about-gallery w-100">
                        <img src="{{ asset('storage/' . $aboutImages[0]->image) }}" 
                             alt="Our professional team" class="img-fluid main-image">
                        <img src="{{ asset('site-assets/index-video.gif') }}" 
                            alt="Monitoring system" class="img-fluid">
                        <img src="{{ asset('storage/' . $aboutImages[1]->image) }}" 
                             alt="Happy customers" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Video Section -->
    <section class="section video-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>{{ $video->title }}</h2>
                <p>{!! $video->desc !!}</p>
            </div>
            <div class="row video-wrapper">
                <div class="col-lg-7 fade-in d-flex align-items-center">
                    <div class="video-container w-100">
                    {!! $video->video_embed !!}
                </div>
                </div>
                <div class="col-lg-5 fade-in d-flex flex-column justify-content-center">
                    <div class="video-info">
                    {!! $video->content !!}
                    <ul class="video-highlights">
                        <li><i class="fas fa-play-circle"></i> Komple kurulum süreci izlenecek yol</li>
                        <li><i class="fas fa-users"></i> Sertifikalı profesyonel ekibimizle tanışın</li>
                        <li><i class="fas fa-chart-bar"></i> Gerçek müşteri tasarrufları ve referansları</li>
                        <li><i class="fas fa-tools"></i> Gelişmiş teknoloji gösterimleri</li>
                        <li><i class="fas fa-leaf"></i> Çevresel etki bilgileri</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced How It Works Section -->
    <section id="process" class="section process-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Güneş Enerjisi Ürünlerimiz</h2>
                <p>En son projelerimiz, güneş enerjisi teknolojileri ve sektördeki gelişmeler hakkında güncel bilgiler</p>
            </div>
            <div class="row process-gallery">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="process-step fade-in">
                            <div class="process-image">
                                <a href="{{ route('blog-details', $blog->slug) }}"><img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="img-fluid process-main-img"></a>
                            </div>
                            <div class="process-gallery-thumbs">
                                @foreach ($blog->images as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}" class="process-gallery-thumb" alt="{{ $image->alt_text }}">
                                @endforeach
                            </div>
                            <a href="{{ route('blog-details', $blog->slug) }}" style="text-decoration: none; color: black; transition: transform 0.3s ease;"><h4 style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">{{ $blog->title }}</h4></a>
                            <p>{!! $blog->desc !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center" style="margin-top: 40px;">
                <a href="{{ route('blogs') }}" class="process-details-btn fade-in">
                    <i class="fas fa-info-circle me-2"></i>Tüm Ürünler
                </a>
            </div>
        </div>
    </section>
    <!-- Process Modal -->
    <div class="process-modal" id="processModal">
        <div class="process-modal-content">
            <button class="process-modal-close" id="processModalClose" aria-label="Close">&times;</button>
            <img src="" alt="Gallery Large" class="process-modal-img" id="processModalImg">
        </div>
    </div>

    <!-- Enhanced Contact Section -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Ücretsiz Güneş Enerjisi Danışmanlığınızı Alın</h2>
                <p>Tasarruf etmeye hazır mısınız? Kişiselleştirilmiş bir güneş enerjisi çözümü için bugün bize ulaşın</p>
                <a href="tel:{{ $contact->phone }}" class="btn btn-primary btn-lg mt-4 contact-btn fade-in">
                    <i class="fas fa-phone-alt me-2"></i>
                    Hemen Tıkla ve Ara
                </a>
            </div>
            <div class="row align-items-stretch mb-4">
                <div class="col-lg-6 d-flex flex-column justify-content-stretch">
                    <div class="contact-form fade-in h-100">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="Adınız" required>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Soyadınız" required>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email Adresiniz" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="tel" class="form-control" name="phone" placeholder="Telefon Numaranız" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <select class="form-control" name="package_type" required>
                                        <option value="">Yapının Türünü Seçin</option>
                                        <option value="residential">Müstakil Ev</option>
                                        <option value="commercial">Tiny House</option>
                                        <option value="industrial">Tarımsal Alan</option>
                                        <option value="other">Endüstriyel Alan</option>
                                        <option value="other">Diğer</option>
                                    </select>
                                    @error('package_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Enerji İhtiyaçlarınızı Bize Bildirin..." required></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-hero w-100">
                                <i class="fas fa-paper-plane me-2"></i>Mesaj Gönder
                            </button>
                        </form>
                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-stretch">
                    <div class="contact-map fade-in h-100 d-flex align-items-center justify-content-center">
                        {!! str_replace('<iframe', '<iframe width="600" height="600"', $contact->map_embed) !!}
                    </div>
                </div>
            </div>
            <div class="contact-info-cards-row fade-in d-flex flex-row flex-wrap justify-content-between gap-3">
                <div class="contact-card d-flex align-items-center flex-row flex-grow-1">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h5>Adres</h5>
                        <p>{{ $contact->address }}</p>
                    </div>
                </div>
                <div class="contact-card d-flex align-items-center flex-row flex-grow-1">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h5>Telefon</h5>
                        <p>{{ $contact->phone }}</p>
                    </div>
                </div>
                <div class="contact-card d-flex align-items-center flex-row flex-grow-1">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h5>Email</h5>
                        <p>{{ $contact->email }}</p>
                    </div>
                </div>
                <div class="contact-card d-flex align-items-center flex-row flex-grow-1">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h5>İş Saatleri</h5>
                        <p>{{ $contact->office_hours }}</p>
                    </div>
                </div>
            </div>
            <div class="social-links mt-4 fade-in">
                @if($contact->facebook_url)
                    <a href="{{ $contact->facebook_url }}" class="social-link"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if($contact->twitter_url)
                    <a href="{{ $contact->twitter_url }}" class="social-link"><i class="fab fa-twitter"></i></a>
                @endif
                @if($contact->linkedin_url)
                    <a href="{{ $contact->linkedin_url }}" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if($contact->instagram_url)
                    <a href="{{ $contact->instagram_url }}" class="social-link"><i class="fab fa-instagram"></i></a>
                @endif
                @if($contact->phone)
                    <a href="https://wa.me/{{ $contact->phone }}" class="social-link"><i class="fab fa-whatsapp"></i></a>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('site-assets/js/index.js') }}"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitButton = form.querySelector('button[type="submit"]');
            const successMessage = document.getElementById('successMessage');
            
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Gönderiliyor...';
            
            fetch('{{ route("messages.store") }}', {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.reset();
                    form.style.display = 'none';
                    successMessage.style.display = 'block';
                } else {
                    alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu. Lütfen tekrar deneyin.');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Mesaj Gönder';
            });
        });
    </script>
    @if(session('scroll'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const contactSection = document.getElementById('contact');
                if (contactSection) {
                    contactSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        </script>
    @endif
@endsection
