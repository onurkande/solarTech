@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Image</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about.images.update', $image) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($image->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($image->image) }}" alt="{{ $image->alt_text }}" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave empty to keep the current image</small>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alt_text">Alt Text (Optional)</label>
                            <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ $image->alt_text }}">
                            @error('alt_text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Image</button>
                        <a href="{{ route('admin.about.images.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 