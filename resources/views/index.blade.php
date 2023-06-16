@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Bum a Ride') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('w3.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .bilgi {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .bilgi .w3-container {
            text-align: center;
            margin-top: 20px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bilgi .w3-row {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .bilgi .kutu1,
        .bilgi .kutu2,
        .bilgi .kutu3 {
            width:300px;
            height: 300px;
            display: inline-block;
            background-color: transparent;
            flex: 1 1 300px;
        }

        .bilgi h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .bilgi p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .bilgi a {
            color: #337ab7;
            text-decoration: none;
        }

        .bilgi a:hover {
            text-decoration: underline;
        }

        @media (max-width: 800px) {
            .bilgi .w3-col {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>

</head>

<body>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px">

    <div class="w3-display-container w3-center">
        <img src="{{ asset('images\banner.jpg') }}" alt="Hitchhiker Image"
             style="width: 100%; height: 500px; object-fit: cover;">

        <div class="w3-display-middle w3-container w3-text-white w3-padding-32 w3-hide-small">
            <span class="banner-text w3-wide">Yolculuk Ara</span>
        </div>
        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
            <form action="{{ route('travels') }}" method="POST" class="nosubmit search-container">
                @csrf
                <div class="form-control">
                    <input type="text" class="form-control" id="departure" name="departure" placeholder="Kalkış Yeri">
                </div>
                <div class="form-control">
                    <input type="text" class="form-control" id="destination" name="destination" placeholder="Varış Yeri">
                </div>
                <div class="form-control">
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <button class="search-btn" onclick="ara()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path
                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                    </svg>
                </button>
            </form>
            @if (session('message'))
                <p>{{ session('message')}}</p>
            @endif
        </div>

    </div>
    <!-- The görsel kısım -->
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">BumaRide Yolculukları</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('{{ asset('images/index1.png') }}'); background-position: center; background-size: cover;">


                    <div style="position: absolute; left: 5px; bottom: 10px;">
                        <h7 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Güvenli ve keyifli yolculuk</h7>
                    </div>

                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('{{ asset('images/index2.png') }}'); background-position: center; background-size: cover;">
                    <div style="position: absolute; left: 5px; bottom: 10px;">
                        <h7 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" >Ekonomik yolculuk</h7>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('{{ asset('images/index3.png') }}'); background-position: center; background-size: cover; ">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1"  >
                        <h7 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Eğlenceli ve rahat yolculuk</h7>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Bumaride bilgi section-->
    <div class="bilgi">
        <div class="w3-container w3-content w3-padding-64" style="max-width:1000px;">
            <div class="w3-row">
                <div class="kutu1">
                    <h3>Seyahatini Ucuza Getir!</h3>
                    <p>BumARide ile yolculuğunun masrafını ikiyeye bölerek üstelik yol arkadaşı edinerek yolculuğunu daha ucuz ve keyifli hale getirebilirsin.</p>
                </div>

                <div class="kutu2">
                    <h3>Yol Arkadaşlarınla İletişimini Kolaylaştır!</h3>
                    <p>BumARide ile yolculuk yapacağın yol arkadaşınla rahatça iletişime geçebilir ve yol arkadaşını puanlayabilirsin.</p>
                </div>

                <div class="kutu3">
                    <h3>BumaRide'la Yolculuk Oluşturmak Çok Kolay!</h3>
                    <p>Eğer bir aracın varsa gideceğin yeri ve tarihi belirledikten sonra rahatlıkla seyahat planını oluşturabilir ve yol arkadaşı bulma işini kolaylaştırabilirsin. Seyahat planı oluşturmak için <a href="{{route('createtrip')}}">tıkla.</a></p>
                </div>

            </div>
        </div>
    </div>

    <!-- The Sıkça Sorulan Sorular Section -->
    <div class="w3-indigo" id="sss">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center">Sıkça Sorulan Sorular (S.S.S)</h2>
            <ul class="w3-ul w3-border w3-white w3-text-grey">
                <li class="w3-padding">
                    <details>
                        <summary>Nasıl yolculuk paylaşımı ilanı veririm?</summary>
                        > BumaRide'da bir yolculuk paylaşımı ilanı vermek kolaydır. Yolculuğunuz için <em><a href="{{route('helpcenter')}}"> daha fazlası için yardım merkezi </a> </em>
                    </details>
                </li>
                <li class="w3-padding">
                    <details>
                        <summary>Yolculuk paylaşımı yolculuğumu nasıl iptal edebilirim?</summary>
                        > Eğer planlarında bir değişiklik olduysa sitemizin "Yolculuklarınız" bölümünden yolculuk paylaşımlı <em><a href="{{route('helpcenter')}}"> daha fazlası için yardım merkezi </a> </em>
                    </details>
                </li>
                <li class="w3-padding">
                    <details>
                        <summary>Yolculuk paylaşımına nasıl başlayabilirim?</summary>
                        > BumaRide ile yolculuk paylaşımı çok kolay ve ücretsizdir! Tek yapman gereken  <em><a href="{{route('helpcenter')}}"> daha fazlası için yardım merkezi</a> </em>
                    </details>
                </li>
                <li class="w3-padding">
                    <details>
                        <summary>Yolculuk paylaşımı ile seyahat etmenin avantajları nelerdir?</summary>
                        > Yolculuk paylaşımının diğer seyahat yöntemleri karşısında çok sayıda avantajı vardır. Yolculuk paylaşımı ile <em><a href="{{route('helpcenter')}}"> daha fazlası için yardım merkezi </a> </em>
                    </details>
                </li>
            </ul>


        </div>
    </div>

</div>


<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function navigate() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    /* var modal = document.getElementById('ticketModal');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } */
</script>
<script src="https://kit.fontawesome.com/b96ee86dee.js" crossorigin="anonymous"></script>


</body>

</html>
@endsection
