<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bum a Ride') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .logo-image img {
            max-height: 40px;
        }
        #logo {
            text-decoration: none !important;
            border-bottom: none !important;
        }
    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <a href="/" id="logo">
            <div class="navbar-brand w3-bar-item w3-button logo-image padding-1-12">
                <img src="{{ asset('images\logo2.png') }}" class="img-fluid">
                {{ config('app.name', 'Bum a Ride') }}
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">

                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                <a href="{{ route('tripsearch') }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Yolculuk Ara</a>

                @guest
                    <!-- @if(Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register' )
                        <a href="{{ route('index') }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Ana Sayfa</a>
                    @endif-->
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Giriş Yap') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="navbar-brand w3-bar-item w3-button logo-image padding-1-12">
                            @if (Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="img-fluid">
                            @endif
                        </div>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('index') }}">
                                    {{ __('Ana Sayfa') }}
                                </a>
                                <form id="logout-form-index" action="{{ route('index') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('tripsearch') }}">
                                    {{ __('Yolculuklarım') }}
                                </a>
                                <form id="logout-form-journeys" action="{{ route('index') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profilim') }}
                                </a>
                                <form id="logout-form-profile" action="{{ route('index') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                             document.getElementById('logout-form-logout').submit();">
                                    {{ __('Çıkış Yap') }}
                                </a>
                                <form id="logout-form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

            </ul>
        </div>

    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- Footer -->
<div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
        <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <p class="text-body-secondary">© BumaRide</p>
        </div>

        <div class="col mb-3">

        </div>
        <div class="col mb-3">
            <h5>En sık kullanılan güzergahlar</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Istanbul → Ankara</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Istanbul → Antalya</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Ankara→ Eskişehir</a></li>
                <li class="nav-item mb-2"><a href="{{route('tripsearch')}}" class="nav-link p-0 text-body-secondary">Yolculuk Ara</a></li>
                <li class="nav-item mb-2"><a href="{{route('index')}}" class="nav-link p-0 text-body-secondary">Yolculuk Oluştur</a></li>
            </ul>
        </div>
        <div class="col mb-3">
            <h5>Hakkında</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="{{route('howitworks')}}" class="nav-link p-0 text-body-secondary">BumaRide Nasıl Çalışır?</a></li>
                <li class="nav-item mb-2"><a href="{{route('aboutus')}}" class="nav-link p-0 text-body-secondary">Hakkımızda</a></li>
                <li class="nav-item mb-2"><a href="{{route('helpcenter')}}" class="nav-link p-0 text-body-secondary">Yardım Merkezi</a></li>
                <li class="nav-item mb-2"><a href="{{route('contactus')}}" class="nav-link p-0 text-body-secondary">Bize Ulaşın</a></li>
            </ul>
        </div>


    </footer>
</div>
</body>
</html>
