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
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 100px;
        }

        .my-div .container:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background: url("{{ url('images/bg2.jpg') }}") no-repeat center;
            background-size: cover;
            filter: blur(50px);
            z-index: -1;
        }

        .my-div .contact-box {
            max-width: 850px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fff;
            box-shadow: 0px 0px 19px 5px rgba(0, 0, 0, 0.19);
        }

        .my-div .left {
            padding: 25px 40px;

        }

        .my-div .right {
            background: url("{{ url('images/bg2.jpg') }}") no-repeat center;
            background-size: cover;
            height: 100%;

        }

        .my-div h2 {
            position: relative;
            padding: 0 0 10px;
            margin-bottom: 10px;
        }

        .my-div h2:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
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
        .my-div .link a{
            width: 100%;
            padding: 0.5rem 1rem;
            text-decoration: none;
            background-color: transparent;
            color: cornflowerblue;
            font-size: 1.1rem;
            border: none;

        }
        .my-div .btn:hover {
            background-color: #3f51b5;
        }

        .my-div .field:focus {
            border: 2px solid rgba(30, 85, 250, 0.47);
            background-color: #fff;
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
            <div class="right"></div>
            <div class="left">
                <h2>{{ __('Giriş Yap') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Kullanıcı İsmi') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Şifre') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Beni Hatırla') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn">
                            {{ __('Giriş yap') }}
                        </button>
                    </div>
                    <div class="link">
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">
                            {{ __('Şifreni Mi Unuttun?') }}
                        </a>
                    @endif
                        <br>
                    <a href="{{ route('register') }}" >{{ __('Hesabın mı yok? Hemen oluştur!') }}</a>
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
