@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Video Section</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.video.edit') }}" class="btn btn-primary btn-sm">Edit Video</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <h4>Title</h4>
                    <p>{{ $video->title ?? 'No title' }}</p>
                    <h4>Description</h4>
                    <p>{{ $video->desc ?? 'No description' }}</p>
                    <h4>Video Embed</h4>
                    <div>{!! $video->video_embed ?? 'No video' !!}</div>
                    <h4>Content</h4>
                    <div>{!! $video->content ?? 'No content' !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 