@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Features</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.features.create') }}" class="btn btn-primary btn-sm">
                            Add New Feature
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Feature Settings</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.feature-settings.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $setting->title ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $setting->content ?? '' }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($features as $feature)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($feature->image) }}" alt="{{ $feature->title }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $feature->title }}</td>
                                <td>{{ Str::limit($feature->content, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 