@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About Images</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.about.images.create') }}" class="btn btn-primary btn-sm">
                            Add New Image
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Alt Text</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $image)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($image->image) }}" alt="{{ $image->alt_text }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $image->alt_text }}</td>
                                <td>
                                    <a href="{{ route('admin.about.images.edit', $image) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.about.images.destroy', $image) }}" method="POST" class="d-inline">
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