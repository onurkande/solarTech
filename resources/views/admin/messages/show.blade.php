@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Message Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Sender Information</h5>
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $message->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $message->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $message->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Package Type:</th>
                                    <td>{{ $message->package_type ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge badge-success">Read</span>
                                            <small class="text-muted">({{ $message->read_at->format('d.m.Y H:i') }})</small>
                                        @else
                                            <span class="badge badge-warning">Unread</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Received:</th>
                                    <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Message</h5>
                            <div class="p-3 bg-light rounded">
                                {{ $message->message }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back to List</a>
                        @if(!$message->is_read)
                            <a href="{{ route('admin.messages.mark-as-read', $message) }}" class="btn btn-success">Mark as Read</a>
                        @endif
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 