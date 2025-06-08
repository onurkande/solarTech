@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Information</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.contact.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $contact->title ?? '') }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required>{{ old('desc', $contact->desc ?? '') }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="map_embed">Map Embed Code</label>
                            <textarea class="form-control" id="map_embed" name="map_embed" rows="3" required>{{ old('map_embed', $contact->map_embed ?? '') }}</textarea>
                            @error('map_embed')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $contact->address ?? '') }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" required>
                            <span class="text-warning">Örnek: +905555555555</span>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email ?? '') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="office_hours">Office Hours</label>
                            <textarea class="form-control" id="office_hours" name="office_hours" rows="3" required>{{ old('office_hours', $contact->office_hours ?? '') }}</textarea>
                            @error('office_hours')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <h4 class="mt-4">Social Media Links</h4>

                        <div class="form-group">
                            <label for="facebook_url">Facebook URL</label>
                            <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $contact->facebook_url ?? '') }}">
                            @error('facebook_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="instagram_url">Instagram URL</label>
                            <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $contact->instagram_url ?? '') }}">
                            @error('instagram_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter_url">Twitter URL</label>
                            <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $contact->twitter_url ?? '') }}">
                            @error('twitter_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="youtube_url">YouTube URL</label>
                            <input type="url" class="form-control" id="youtube_url" name="youtube_url" value="{{ old('youtube_url', $contact->youtube_url ?? '') }}">
                            @error('youtube_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="linkedin_url">LinkedIn URL</label>
                            <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $contact->linkedin_url ?? '') }}">
                            @error('linkedin_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Contact Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 