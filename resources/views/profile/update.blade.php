@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Güncelleme</h1>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="username" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Ad</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Soyad</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Telefon Numarası</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Yeni Şifre</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Şifre Onayı</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">Kendinizi Tanıtın</label>
                    <textarea class="form-control" id="about" name="about" rows="5">{{ old('about', $user->about) }}</textarea>
                    @error('about')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="vehicle_info" class="form-label">Taşıt Bilgisi</label>
                    <input type="text" class="form-control" id="vehicle_info" name="vehicle_info" value="{{ old('vehicle_info', $user->vehicle_info) }}">
                    @error('vehicle_info')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Profil Resmi</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    @error('profile_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
        </div>
    </div>

@endsection
