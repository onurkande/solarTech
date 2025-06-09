@extends('admin.layouts.master')

@section('title', 'Edit About Information')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit About Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about.update', $about) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $about->title ?? '' }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="editor-desc" name="desc" rows="3">{{ $about->desc ?? '' }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mission">Mission</label>
                            <textarea class="form-control" id="editor-mission" name="mission" rows="3">{{ $about->mission ?? '' }}</textarea>
                            @error('mission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vission">Vision</label>
                            <textarea class="form-control" id="editor-vision" name="vission" rows="3">{{ $about->vission ?? '' }}</textarea>
                            @error('vission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="our_values">Our Values</label>
                            <textarea class="form-control" id="editor-values" name="our_values" rows="3">{{ $about->our_values ?? '' }}</textarea>
                            @error('our_values')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="editor-content" name="content" rows="10">{{ $about->content ?? '' }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update About</button>
                        <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
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
    CKEDITOR.replace('editor-desc');
    CKEDITOR.replace('editor-mission');
    CKEDITOR.replace('editor-vision');
    CKEDITOR.replace('editor-values');
    CKEDITOR.replace('editor-content');
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection
