@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Messages</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Package Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                                    <td>{{ $message->full_name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->package_type_in_turkish ?? 'N/A' }}</td>
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge badge-success">Read</span>
                                        @else
                                            <span class="badge badge-warning">Unread</span>
                                        @endif
                                    </td>
                                    <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if(!$message->is_read)
                                            <a href="{{ route('admin.messages.mark-as-read', $message) }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($totalPages > 1)
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('admin.messages.index', ['page' => $currentPage - 1]) }}">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            @for($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ route('admin.messages.index', ['page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($currentPage < $totalPages)
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('admin.messages.index', ['page' => $currentPage + 1]) }}">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .page-item {
        margin: 0 2px;
    }
    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 35px;
        height: 35px;
        padding: 0 10px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        color: #007bff;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
    .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #0056b3;
    }
    .page-item.active .page-link:hover {
        background-color: #007bff;
        color: white;
    }
</style>
@endpush 