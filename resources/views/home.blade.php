@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Bum a Ride') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="resources/css/home.css">
    <style type="text/css" id="operaUserStyle"></style></head>
<body>
<section class="py-5 my-5">
    <div class="container">

        <h1 class="mb-5">Profil Ayarları</h1>
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">

            <div class="profile-tab-nav border-right">

                <div class="p-4">
                    <div class="img-circle text-center mb-3">

                        <form action="{{ route('profile.uploadImage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="profile_image">Profil Resmi</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                            </div>
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                        <form action="{{ route('profile.deleteImage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            @if (Auth()->user()->profile_image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . Auth()->user()->profile_image) }}" alt="Profil Resmi" class="rounded-circle" width="100">
                                    <button type="submit" class="btn btn-danger mt-2">Profil Resmini Kaldır</button>
                                </div>
                            @endif

                            @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>

                    </div>
                    <h4 class="text-center">{{ Auth()->user()->username }}</h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i>
                        Kişisel Bilgiler
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i>
                        Şifre
                    </a>
                    <a class="nav-link" id="vehicle_info-tab" data-toggle="pill" href="#vehicle_info" role="tab" aria-controls="vehicle_info" aria-selected="false">
                        <i class="fa fa-car text-center mr-1"></i>
                        Taşıt Bilgileri
                    </a>
                    <a class="nav-link" id="comments-tab" data-toggle="pill" href="#comments" role="tab" aria-controls="comments" aria-selected="false">
                        <i class="fa fa-comment text-center mr-1"></i>
                        Yorum İşlemleri
                    </a>
                    <a class="nav-link" id="remove-tab" data-toggle="pill" href="#remove" role="tab" aria-controls="remove" aria-selected="false">
                        <i class="fa fa-remove text-center mr-1"></i>
                        Hesabı Kaldır
                    </a>
                </div>
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Kişisel Bilgiler</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-label">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}">
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">İsim</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{  Auth::user()->first_name }}">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Soyisim</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{  Auth::user()->last_name}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Telefon Numarası</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about" class="form-label">Hakkımda</label>
                                    <textarea name="about" rows="4" class="form-control">{{ Auth()->user()->about }}</textarea>

                                    @error('about')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                            <a href="{{ route('profile') }}" class="btn btn-secondary">İptal</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary">Çıkış Yap</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                        <div>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <h3 class="mb-4">Şifre Ayarları</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form method="POST" action="{{ route('profile.updatePassword') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="current_password" class="col-md-4 col-form-label text-md-right">Eski Şifre</label>

                                            <div class="col-md-6">
                                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                                                @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Yeni Şifre</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Yeni Şifreyi Onayla</label>

                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                                <a href="{{ route('profile') }}" class="btn btn-secondary">İptal</a>
                                            </div>
                                        </div>

                                        @if(session('success'))
                                            <div class="form-group row mt-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="vehicle_info" role="tabpanel" aria-labelledby="vehicle_info-tab">
                        <h3 class="mb-4">Taşıt Bilgilerini Paylaş</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <form method="POST" action="{{ route('profile.vehicle_info') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="vehicle_brand">Araç Markası</label>
                                            <input type="text" name="vehicle_brand" id="vehicle_brand" value="{{ isset($user->vehicle_info['brand']) ? $user->vehicle_info['brand'] : '' }}" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_model">Araç Modeli</label>
                                            <input type="text" name="vehicle_model" id="vehicle_model" value="{{ isset($user->vehicle_info['model']) ? $user->vehicle_info['model'] : '' }}" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_year">Araç Yılı</label>
                                            <input type="text" name="vehicle_year" id="vehicle_year" value="{{ isset($user->vehicle_info['year']) ? $user->vehicle_info['year'] : '' }}" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_capacity">Araç Kapasitesi</label>
                                            <input type="text" name="vehicle_capacity" id="vehicle_capacity" value="{{ isset($user->vehicle_info['capacity']) ? $user->vehicle_info['capacity'] : '' }}" class="form-control">

                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                                <a href="{{ route('profile') }}" class="btn btn-secondary">İptal</a>
                                            </div>
                                        </div>

                                        @if(session('success'))
                                            <div class="form-group row mt-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BURAYA YORUMLARIN GÖRÜNMESİ KISMI GELECEK-->
                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        <h3 class="mb-4">Yorumlar</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="app-check">
                                        <label class="form-check-label" for="app-check">
                                            App check
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Lorem ipsum dolor sit.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('profile') }}" class="btn btn-secondary">İptal</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="remove" role="tabpanel" aria-labelledby="remove-tab">
                        <h3 class="mb-4">Hesabı Sil</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <form action="{{ route('profile.delete') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <p>Hesabınızı silmek istediğinizden emin misiniz?</p>
                                            <button type="submit" class="btn btn-danger">Hesabı Sil</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>



<script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
@endsection
