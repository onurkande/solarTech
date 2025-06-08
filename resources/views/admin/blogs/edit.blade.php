@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            @if($blog->cover_image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($blog->cover_image) }}" alt="cover" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="cover_image" name="cover_image">
                            <small class="form-text text-muted">Leave empty to keep the current image</small>
                            @error('cover_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{ $blog->desc }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="editor-content" name="content" rows="8">{{ $blog->content }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags (virgülle ayırın)</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="{{ $blog->tags }}">
                            @error('tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <h4>Blog Images</h4>
                        <div class="row">
                            @foreach($blog->images as $img)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ Storage::url($img->image) }}" class="card-img-top" alt="{{ $img->alt_text }}">
                                    <div class="card-body p-2">
                                        <a href="{{ route('admin.blogs.images.delete', [$blog, $img]) }}" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Delete this image?')">Delete</a>
                                        @if($img->alt_text)
                                            <small class="text-muted">{{ $img->alt_text }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="images">Add Blog Images (Multiple)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            @error('images')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
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