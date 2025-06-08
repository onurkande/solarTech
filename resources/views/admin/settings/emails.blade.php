@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Email Adresleri</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.emails.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="email">Yeni Email Adresi</label>
                            <div class="input-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                </div>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($emails as $email)
                                    <tr>
                                        <td>{{ $email->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.emails.toggle-status', $email) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm {{ $email->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $email->is_active ? 'Aktif' : 'Pasif' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.emails.destroy', $email) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu email adresini silmek istediğinizden emin misiniz?')">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Henüz email adresi eklenmemiş.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 