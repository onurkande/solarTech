@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Ayarları</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            @if($settings && $settings->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" style="max-height: 100px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">İçerik</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor-content" name="content" rows="5">{{ old('content', $settings->content ?? '') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bottom_text1">Alt Metin 1</label>
                            <textarea class="form-control @error('bottom_text1') is-invalid @enderror" id="bottom_text1" name="bottom_text1" rows="3">{{ old('bottom_text1', $settings->bottom_text1 ?? '') }}</textarea>
                            @error('bottom_text1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bottom_text2">Alt Metin 2</label>
                            <textarea class="form-control @error('bottom_text2') is-invalid @enderror" id="bottom_text2" name="bottom_text2" rows="3">{{ old('bottom_text2', $settings->bottom_text2 ?? '') }}</textarea>
                            @error('bottom_text2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <h4>Mail Ayarları</h4>

                        <div class="form-group">
                            <label for="MAIL_MAILER">Mail Sürücüsü</label>
                            <input type="text" class="form-control @error('MAIL_MAILER') is-invalid @enderror" id="MAIL_MAILER" name="MAIL_MAILER" value="{{ old('MAIL_MAILER', $settings->MAIL_MAILER ?? '') }}">
                            @error('MAIL_MAILER')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_HOST">Mail Sunucusu</label>
                            <input type="text" class="form-control @error('MAIL_HOST') is-invalid @enderror" id="MAIL_HOST" name="MAIL_HOST" value="{{ old('MAIL_HOST', $settings->MAIL_HOST ?? '') }}">
                            @error('MAIL_HOST')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_PORT">Port</label>
                            <input type="text" class="form-control @error('MAIL_PORT') is-invalid @enderror" id="MAIL_PORT" name="MAIL_PORT" value="{{ old('MAIL_PORT', $settings->MAIL_PORT ?? '') }}">
                            @error('MAIL_PORT')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_USERNAME">Kullanıcı Adı</label>
                            <input type="text" class="form-control @error('MAIL_USERNAME') is-invalid @enderror" id="MAIL_USERNAME" name="MAIL_USERNAME" value="{{ old('MAIL_USERNAME', $settings->MAIL_USERNAME ?? '') }}">
                            @error('MAIL_USERNAME')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_PASSWORD">Şifre</label>
                            <input type="password" class="form-control @error('MAIL_PASSWORD') is-invalid @enderror" id="MAIL_PASSWORD" name="MAIL_PASSWORD" value="{{ old('MAIL_PASSWORD', $settings->MAIL_PASSWORD ?? '') }}">
                            @error('MAIL_PASSWORD')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_ENCRYPTION">Şifreleme</label>
                            <input type="text" class="form-control @error('MAIL_ENCRYPTION') is-invalid @enderror" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" value="{{ old('MAIL_ENCRYPTION', $settings->MAIL_ENCRYPTION ?? '') }}">
                            @error('MAIL_ENCRYPTION')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_FROM_ADDRESS">Gönderen Adresi</label>
                            <input type="email" class="form-control @error('MAIL_FROM_ADDRESS') is-invalid @enderror" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" value="{{ old('MAIL_FROM_ADDRESS', $settings->MAIL_FROM_ADDRESS ?? '') }}">
                            @error('MAIL_FROM_ADDRESS')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="MAIL_FROM_NAME">Gönderen Adı</label>
                            <input type="text" class="form-control @error('MAIL_FROM_NAME') is-invalid @enderror" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" value="{{ old('MAIL_FROM_NAME', $settings->MAIL_FROM_NAME ?? '') }}">
                            @error('MAIL_FROM_NAME')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('editor-content');
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection 