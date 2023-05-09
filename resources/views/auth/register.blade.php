@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kayıt ol') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Kullanıcı İsmi') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('İsim') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Soyisim') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Telefon Numarası') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="phone"
                                           pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" placeholder="555 555 55 55">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Şifre') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Şifreyi Doğrula') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kayıt ol') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
