@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Our Story</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.about.stories.create') }}" class="btn btn-primary btn-sm">
                            Add New Story
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
                                <th>Year</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stories as $story)
                            <tr>
                                <td>{{ $story->year }}</td>
                                <td>{{ $story->title }}</td>
                                <td>{{ Str::limit($story->desc, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.about.stories.edit', $story) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.about.stories.destroy', $story) }}" method="POST" class="d-inline">
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