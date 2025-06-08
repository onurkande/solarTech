@extends('site.layouts.master')

@section('title', 'Güneş Enerjisi - İletişim')

@section('meta')
    <meta name="description" content="Güneş enerjisi çözümleri, ücretsiz danışmanlık ve uzman tavsiyesi için bizimle iletişime geçin. Formu doldurun veya telefon ya da e-posta yoluyla bize ulaşın.">
    <meta name="keywords" content="güneş enerjisi, iletişim, danışmanlık, solar çözümler, yenilenebilir enerji">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site-assets/css/contact.css') }}">
@endsection

@section('content')
    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content fade-in">
                <h1><i class="fas fa-headset"></i>Size Yardımcı Olalım</h1>
                <p>Enerji çözümlerimiz hakkında bilgi almak veya ücretsiz bir anket talep etmek için formu doldurun veya bizimle iletişime geçin. Uzman ekibimiz tüm güneş enerjisi ihtiyaçlarınızda size yardımcı olmaya hazır.</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form" class="section contact-form-section">
        <div id="contact" class="container">
            <div class="section-title fade-in">
                <h2>{{$contact->title}}</h2>
                <p>{{$contact->desc}}</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="contact-form-container fade-in">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">Adınız *</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Soyadınız *</label>
                                    <input type="text" class="form-control"  name="last_name" required>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Adresiniz *</label>
                                    <input type="email" class="form-control" name="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefon Numaranız *</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="package" class="form-label">Yapının Türü</label>
                                <select class="form-control" name="package_type">
                                    <option value="">Yapının Türünü Seçin</option>
                                    <option value="residential">Müstakil Ev</option>
                                    <option value="commercial">Tiny House</option>
                                    <option value="industrial">Tarımsal Alan</option>
                                    <option value="consultation">Endüstriyel Alan</option>
                                    <option value="other">Diğer</option>
                                </select>
                                @error('package_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mesajınız</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Enerji ihtiyaçlarınızı, özelliklerini veya herhangi bir sorunuzu bize bildirin..." required></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-submit">
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
                <div class="col-lg-6">
                    <div class="map-container fade-in">
                        {!! $contact->map_embed !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="section contact-info-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>İletişime Geçin</h2>
                <p>Size kolaylık sağlamak için bize ulaşmanın birden fazla yolu</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-info-card fade-in">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Ofis Adresimiz</h4>
                        <p>{{$contact->address}}</p>
                        <a href="https://maps.google.com/maps?q={{urlencode($contact->address)}}" target="_blank" class="contact-action-btn">
                            <i class="fas fa-directions me-2"></i>Haritada Gör
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-card fade-in">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Şimdi Ara</h4>
                        <p>{{$contact->phone}}</p>
                        <a href="tel:{{$contact->phone}}" class="contact-action-btn">
                            <i class="fas fa-phone me-2"></i>Call Us
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-card fade-in">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email</h4>
                        <p>{{$contact->email}}</p>
                        <a href="mailto:{{$contact->email}}" class="contact-action-btn">
                            <i class="fas fa-envelope me-2"></i>Email Gönder
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Hours Section -->
    <section class="section office-hours-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Ofis Saatleri</h2>
                <p>İhtiyacınız olduğunda buradayız</p>
            </div>
            <div class="office-hours-card fade-in">
                <div class="office-hours-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>İş Saatleri</h4>
                {{$contact->office_hours}}
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="section social-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Bizi Takip Edin</h2>
                <p>Güneş enerjisi hakkında en son güncellemeleri alın</p>
            </div>
            <div class="social-links-container fade-in">
                @if ($contact->facebook_url)
                    <a href="{{$contact->facebook_url}}" class="social-link" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif
                @if ($contact->twitter_url)
                    <a href="{{$contact->twitter_url}}" class="social-link" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif
                @if ($contact->linkedin_url)
                    <a href="{{$contact->linkedin_url}}" class="social-link" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                @endif
                @if ($contact->instagram_url)
                    <a href="{{$contact->instagram_url}}" class="social-link" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
                @if ($contact->youtube_url)
                    <a href="{{$contact->youtube_url}}" class="social-link" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif
                @if ($contact->phone)
                    <a href="https://wa.me/{{$contact->phone}}" class="social-link" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('site-assets/js/contact.js') }}"></script>
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

