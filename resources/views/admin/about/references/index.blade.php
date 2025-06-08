@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">References</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.about.references.create') }}" class="btn btn-primary btn-sm">
                            Add New Reference
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
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($references as $reference)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($reference->image) }}" alt="Reference" style="max-width: 100px;">
                                </td>
                                <td>{{ $reference->url ?? 'No URL' }}</td>
                                <td>
                                    <a href="{{ route('admin.about.references.edit', $reference) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.about.references.destroy', $reference) }}" method="POST" class="d-inline">
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