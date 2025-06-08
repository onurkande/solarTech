@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blogs</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">Add New Blog</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Tags</th>
                                <th>Reading Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td><img src="{{ Storage::url($blog->cover_image) }}" alt="cover" style="max-width: 80px;"></td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->tags }}</td>
                                <td>{{ $blog->reading_time }} min</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-sm btn-secondary">Show</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline">
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