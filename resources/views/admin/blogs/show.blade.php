@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blog Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Title</h4>
                    <p>{{ $blog->title }}</p>
                    <h4>Slug</h4>
                    <p>{{ $blog->slug }}</p>
                    <h4>Cover Image</h4>
                    <img src="{{ Storage::url($blog->cover_image) }}" alt="cover" style="max-width: 300px;">
                    <h4>Description</h4>
                    <p>{{ $blog->desc }}</p>
                    <h4>Content</h4>
                    <div>{!! $blog->content !!}</div>
                    <h4>Tags</h4>
                    <p>{{ $blog->tags }}</p>
                    <h4>Reading Time</h4>
                    <p>{{ $blog->reading_time }} min</p>
                    <h4>Images</h4>
                    <div class="row">
                        @foreach($blog->images as $img)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ Storage::url($img->image) }}" class="card-img-top" alt="{{ $img->alt_text }}">
                                <div class="card-body p-2">
                                    @if($img->alt_text)
                                        <small class="text-muted">{{ $img->alt_text }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 