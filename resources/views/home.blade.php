@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Yönetimi</h1>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="mb-4">
                @if( Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profil Resmi" class="rounded-circle" width="100">
                @else
                    <div class="text-center">
                        <i class="fas fa-user-circle fa-5x"></i>
                    </div>
                @endif
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3>Kişisel Bilgiler</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username',  Auth::user()->username) }}" required>
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">İsim</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name',  Auth::user()->first_name) }}" required>
                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Soyisim</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}" required>
                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Telefon Numarası</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number',  Auth::user()->phone_number) }}" required>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">Hakkımda</label>
                    <textarea name="about" rows="4" class="form-control">{{ Auth()->user()->about }}</textarea>

                    @error('last_name')
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
                    <label for="profile_image" class="form-label">Profil Resmi</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    @error('profile_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kaydet</button>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary">Çıkış Yap</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </form>

        </div>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <form action="{{ route('profile.delete') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hesabı Sil</button>
        </form>
        </div>
    </div>
@endsection
