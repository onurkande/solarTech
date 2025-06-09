@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Video Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.video.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $video->title ?? '' }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{ $video->desc ?? '' }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="video_embed">Video Embed</label>
                            <textarea class="form-control" id="video_embed" name="video_embed" rows="3" required>{{ $video->video_embed ?? '' }}</textarea>
                            @error('video_embed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="editor-content" name="content" rows="5">{{ $video->content ?? '' }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Video</button>
                        <a href="{{ route('admin.video.index') }}" class="btn btn-secondary">Cancel</a>
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