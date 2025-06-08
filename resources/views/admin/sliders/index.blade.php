@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slider Ayarları</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.sliders.update-settings') }}" method="POST" class="mb-4">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $settings->title ?? '') }}" required>
                            @error('title')
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
                            <label for="button_text">Buton Metni</label>
                            <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ old('button_text', $settings->button_text ?? '') }}">
                            @error('button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                    </form>

                    <hr>

                    <h4>Slider Görselleri</h4>
                    <form action="{{ route('admin.sliders.store-image') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="image">Yeni Görsel</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Sıra</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $images->count()) }}" required>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Görsel Ekle</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 100px">Sıra</th>
                                    <th>Görsel</th>
                                    <th style="width: 100px">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @forelse($images as $image)
                                    <tr data-id="{{ $image->id }}">
                                        <td>
                                            <input type="number" class="form-control order-input" value="{{ $image->order }}" min="0">
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="Slider Görseli" style="max-height: 100px;">
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.sliders.destroy-image', $image) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu görseli silmek istediğinizden emin misiniz?')">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Henüz görsel eklenmemiş.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const editorIDs = ['editor-content'];

    editorIDs.forEach(id => {
        const element = document.querySelector(`#${id}`);
        if (element) {
            ClassicEditor.create(element, editorConfig).catch(error => {
                console.error(`CKEditor initialization failed for #${id}`, error);
            });
        }
    });

    // Sıralama işlemi için
    document.querySelectorAll('.order-input').forEach(input => {
        input.addEventListener('change', function() {
            const id = this.closest('tr').dataset.id;
            const order = this.value;
            
            fetch('{{ route("admin.sliders.update-image-order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    orders: {
                        [id]: order
                    }
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        });
    });
</script>
@endsection 