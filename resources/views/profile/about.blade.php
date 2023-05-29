@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hakkımda</h1>
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('profile.about') }}" method="POST">
                @csrf
                @method('PUT')
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
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
@endsection
