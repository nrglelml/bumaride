@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

    <style>
        .my-div {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
            height: 100vh;
            width: 100%;
        }

        .my-div .container {
            position: relative;
            width: 250%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 100px;
        }

        .my-div .container:after {
            content: '';
            position: absolute;
            width: 250%;
            height: 100%;
            left: 0;
            top: 0;
            background: url("{{ url('images/bg3.jpg') }}") no-repeat center;
            background-size: cover;
            filter: blur(50px);
            z-index: -1;
        }

        .my-div .contact-box {
            max-width: 1000px;
            width: 90%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            justify-content: center;
            align-items: center;
            background-color: #fff;
            box-shadow: 0px 0px 19px 5px rgba(0, 0, 0, 0.19);
            box-sizing: border-box;,
        }

        .my-div .right {
            padding: 25px 40px;

        }

        .my-div .left {
            background: url("{{ url('images/bg3.jpg') }}") no-repeat center;
            background-size: contain;
            background-attachment: local;
            height: 100%;


        }

        .my-div h2 {
            position: relative;
            padding: 0 0 10px;
            margin-bottom: 10px;
            text-align: center !important;
        }

        .my-div h2:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            text-align: center !important;
            transform: translateX(-50%);
            height: 4px;
            width: 50px;
            border-radius: 2px;
            background-color: #3f51b5;
        }

        .my-div .field {
            width: 100%;
            border: 2px solid rgba(0, 0, 0, 0);
            outline: none;
            background-color: rgba(230, 230, 230, 0.6);
            padding: 0.5rem 1rem;
            font-size: 1.1rem;
            margin-bottom: 22px;
            transition: .3s;
        }

        .my-div .field:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .my-div textarea {
            min-height: 150px;
        }

        .my-div .btn {
            width: 100%;
            padding: 0.5rem 1rem;
            background-color: #3c97bf;
            color: #fff;
            font-size: 1.1rem;
            border: none;
            outline: none;
            cursor: pointer;
            transition: .3s;
        }

        .my-div .link a {
            text-decoration: none;
            color: cornflowerblue;
            border: none;
        }

        .my-div .btn:hover {
            background-color: #3f51b5;
        }

        .my-div .field:focus {
            border: 2px solid rgba(30, 85, 250, 0.47);
            background-color: #fff;
        }
     .my-div .mb-3 label{
         text-align: left !important;
     }
        @media screen and (max-width: 880px) {
            .my-div .contact-box {
                grid-template-columns: 1fr;
            }

            .my-div .left {
                height: 200px;
            }
        }
    </style>
</head>
<body>
<div class="my-div">
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>{{ __('Kayıt ol') }}</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username"
                               class="col-md-4 col-form-label text-md-end">{{ __('Kullanıcı İsmi') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror" name="username"
                                   value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="first_name"
                               class="col-md-4 col-form-label text-md-end">{{ __('İsim') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                   value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="last_name"
                               class="col-md-4 col-form-label text-md-end">{{ __('Soyisim') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                   class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                   value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number"
                               class="col-md-4 col-form-label text-md-end">{{ __('Telefon Numarası') }}</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="tel"
                                   class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                   value="{{ old('phone_number') }}" required autocomplete="phone_number"
                                   pattern="[0-9]{10}" placeholder="5555555555">

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
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
                    <div class="mb-3">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-end">{{ __('Şifreyi Doğrula') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn">{{ __('Kayıt ol') }}</button>
                    </div>
                    <div class="link">
                        Hesabın var mı?
                        <a href="{{ route('login') }}">Giriş Yap</a>
                    </div>
                </form>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div>
                    @if(session('error'))
                        <div class="invalid-feedback" role="alert">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
