@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Feature</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.features.update', $feature) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($feature->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($feature->image) }}" alt="{{ $feature->title }}" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave empty to keep the current image</small>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $feature->title }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="editor-content" name="content" rows="3">{{ $feature->content }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Feature</button>
                        <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
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
</script>
@endsection 
