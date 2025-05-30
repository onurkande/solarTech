<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <a href="{{route('index')}}"><img src="{{asset('storage/'.$siteSettings->logo)}}" alt="SineklikCi Logo" class="footer-logo mb-4"></a>
                <p>{{$siteSettings->desc}}</p>
                <div class="social-links">
                    @if($siteSettings->facebook_url)
                        <a href="{{$siteSettings->facebook_url}}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($siteSettings->twitter_url)
                        <a href="{{$siteSettings->twitter_url}}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($siteSettings->instagram_url)
                        <a href="{{$siteSettings->instagram_url}}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($siteSettings->youtube_url)
                        <a href="{{$siteSettings->youtube_url}}"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h4>Hızlı Linkler</h4>
                <ul class="footer-links">
                    <li><a href="{{route('index')}}">Ana Sayfa</a></li>
                    <li><a href="{{route('about')}}">Hakkımızda</a></li>
                    <li><a href="{{route('products')}}">Ürünlerimiz</a></li>
                    <li><a href="{{route('videos')}}">Videolar</a></li>
                    <li><a href="{{route('contact')}}">İletişim</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h4>Ürünlerimiz</h4>
                <ul class="footer-links">
                    @foreach($products as $product)
                        <li><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <h4>İletişim</h4>
                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt"></i> {{$contact->address}}</li>
                    <li><i class="fas fa-phone-alt"></i> <a href="tel:{{$contact->telephone}}">{{$contact->telephone}}</a></li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                    <li><i class="fas fa-clock"></i> {{$contact->working_hours}}</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6">
                    <p>{{$siteSettings->bottom_desc}}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>{{$siteSettings->bottom_content}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>