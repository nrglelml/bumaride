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
                font-family: "Lato", sans-serif
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
                    <form class="nosubmit search-container">
                        <div class="departure">
                            <input class="nosubmit departure" type="search" placeholder="Kalkış Yeri">
                        </div>
                        <div class="target">
                            <input class="nosubmit target" type="search" placeholder="Varış Yeri">
                        </div>
                        <div class="datePicker">
                            <input class="nosubmit date" type="date">
                        </div>
                        <button class="search-btn" onclick="ara()">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
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


            <!-- The İletişim Section -->
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
                <h2 class="w3-wide w3-center">İletişim</h2>
                <p class="w3-opacity w3-center"><i>Sorunuz Mu Var?</i></p>
                <div class="w3-row w3-padding-32">
                    <div class="w3-col m6 w3-large w3-margin-bottom">
                        <i class="fa fa-map-marker" style="width:30px"></i> İZMİR BUCA<br>
                        <i class="fa fa-phone" style="width:30px"></i> Telefon: +090 555 555 55 55<br>
                        <i class="fa fa-envelope" style="width:30px"> </i> E-posta:200290061@firat.edu.tr <br>
                    </div>
                    <div class="w3-col m6">
                        <form action="/action_page.php" target="_blank">
                            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                                <div class="w3-half">
                                    <input class="w3-input w3-border" type="text" placeholder="İsminiz" required
                                        name="Name">
                                </div>
                                <div class="w3-half">
                                    <input class="w3-input w3-border" type="text" placeholder="E-postanız" required
                                        name="Email">
                                </div>
                            </div>
                            <input class="w3-input w3-border" type="text" placeholder="Mesajınız" required
                                name="Message">
                            <button class="w3-button w3-black w3-section w3-right" type="submit">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End Page Content -->
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
