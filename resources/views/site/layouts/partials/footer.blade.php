<!-- Enhanced Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" class="footer-logo" style="max-width: 100px; max-height: 100px;">
               {!! $settings->content !!}
                <div class="mt-3">
                    <small><i class="fas fa-award me-1"></i>  Sertifikalı ve Lisanslı</small><br>
                    <small><i class="fas fa-shield-alt me-1"></i> Tamamen Sigortalı</small><br>
                    <small><i class="fas fa-leaf me-1"></i> Çevresel Uyumlu Çözümler</small>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Hizmetlerimiz</h4>
                <ul>
                    @foreach ($blogs->take(4) as $blog)
                        <li><a href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Hızlı Bağlantılar</h4>
                <ul>
                    <li><a href="{{route('about')}}">Hakkımızda</a></li>
                    <li><a href="{{route('blogs')}}">Ürünlerimiz</a></li>
                    <li><a href="{{route('contact')}}">İletişim</a></li>
                    <li><a href="{{route('contact')}}#contact-form">Teklif Al</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Bültenimize Kayıt Olun</h4>
                <p>Güneş enerjisi hakkında en son güncellemeleri alın</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Email adresinizi giriniz" required>
                    <button type="submit">Gönder</button>
                </form>
                <div class="mt-3">
                    <small><i class="fas fa-envelope me-1"></i> Haftalık Güncellemeler</small><br>
                    <small><i class="fas fa-gift me-1"></i> Özel Teklifler</small><br>
                    <small><i class="fas fa-newspaper me-1"></i> Sanayi Haberleri</small>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-social">
                @if ($contact->facebook_url)
                    <a href="{{$contact->facebook_url}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if ($contact->twitter_url)
                    <a href="{{$contact->twitter_url}}" title="Twitter"><i class="fab fa-twitter"></i></a>
                @endif
                @if ($contact->linkedin_url)
                    <a href="{{$contact->linkedin_url}}" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if ($contact->instagram_url)
                    <a href="{{$contact->instagram_url}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if ($contact->youtube_url)
                    <a href="{{$contact->youtube_url}}" title="YouTube"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
            <p>{{$settings->bottom_text1}}</p>
            <p><small>{{$settings->bottom_text2}}</small></p>
        </div>
    </div>
</footer>