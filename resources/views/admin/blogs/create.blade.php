@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Blog</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" class="form-control" id="cover_image" name="cover_image" required>
                            @error('cover_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{ old('desc') }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="editor-content" name="content" rows="8">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags (virgülle ayırın)</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
                            @error('tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">Blog Images (Multiple)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            @error('images')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Blog</button>
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