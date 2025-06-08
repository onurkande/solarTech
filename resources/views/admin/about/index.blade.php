@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About Information</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.about.edit', $about) }}" class="btn btn-primary btn-sm">
                            Edit About
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Title</h4>
                            <p>{{ $about->title ?? 'No title' }}</p>

                            <h4>Description</h4>
                            <p>{!! $about->desc ?? 'No description' !!}</p>

                            <h4>Mission</h4>
                            <p>{!! $about->mission ?? 'No mission' !!}</p>

                            <h4>Vision</h4>
                            <p>{!! $about->vission ?? 'No vision' !!}</p>

                            <h4>Our Values</h4>
                            <p>{!! $about->our_values ?? 'No our values' !!}</p>

                            <h4>Content</h4>
                            <div class="content">
                                {!! $about->content ?? 'No content' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 