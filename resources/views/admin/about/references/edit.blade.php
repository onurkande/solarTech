@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Reference</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about.references.update', $reference) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($reference->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($reference->image) }}" alt="Reference" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave empty to keep the current image</small>
                        </div>
                        <div class="form-group">
                            <label for="url">URL (Optional)</label>
                            <input type="url" class="form-control" id="url" name="url" value="{{ $reference->url }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Reference</button>
                        <a href="{{ route('admin.about.references.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 