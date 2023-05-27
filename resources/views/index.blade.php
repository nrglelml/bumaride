@extends('layouts.app')
    @section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bum A Ride</title>
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
    <div class="w3-content" style="max-width:2000px;margin-top:46px">

        <div class="w3-display-container w3-center">
            <img src="{{ asset('images\hitchhikerstock.jpg') }}" alt="Hitchhiker Image"
                style="width: 100%; height: 500px; object-fit: cover;">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>Asprin yolu temsili değil</h3>
                <p><b>Ahmet Kabaklı'ya kadar atar mısın abi?</b></p>
            </div>

        </div>

        <!-- The Hakkımızda Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="about">
            <h2 class="w3-wide">Biz Kimiz?</h2>
            <p class="w3-opacity"><i>Biz maceraseveriz</i></p>
            <i class="fab fa-font-awesome"></i>
            <p class="w3-justify w3-center">Macera yolculuklarımızı daha kolay ve daha eğlenceli hale getirmek için bir
                site yapmaya karar verdik.</p>
            <div class="w3-row w3-padding-32">
                <div class="w3-third">
                    <p>Mehmet Emin Çakın</p>
                    <img src="{{ asset('images\mehmet.jpg') }}" class="w3-round w3-margin-bottom" alt="Memin Çakın"
                        style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Nurgül Elmalı</p>
                    <img src="{{ asset('images\nurgul.png') }}" class="w3-round w3-margin-bottom" alt="Nurgül Elmalı"
                        style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Deniz Akbay</p>
                    <img src="{{ asset('images\deniz.jpg') }}" class="w3-round w3-margin-bottom"
                        alt="Deniz Akbay" style="width:60%">
                </div>
                <p class="w3-justify w3-center"> Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <!-- The Sıkça Sorulan Sorular Section -->
        <div class="w3-indigo" id="sss">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
                <h2 class="w3-wide w3-center">Sıkça Sorulan Sorular (S.S.S)</h2>
                <p class="w3-opacity w3-center"><i>Belki okuyan olur diye</i></p><br>


                <ul class="w3-ul w3-border w3-white w3-text-grey">
                    <li class="w3-padding">
                        <details>
                            <summary>Nasıl şeyi şey yapabilirim?</summary>
                            > Abi onu şeyden <em>şöyle</em> yapacan.
                        </details>
                    </li>
                    <li class="w3-padding">
                        <details>
                            <summary>Nasıl şeyi şey yapabilirim?</summary>
                            > Abi onu şeyden <em>şöyle</em> yapacan.
                        </details>
                    </li>
                    <li class="w3-padding">
                        <details>
                            <summary>Nasıl şeyi şey yapabilirim?</summary>
                            > Abi onu şeyden <em>şöyle</em> yapacan.
                        </details>
                    </li>
                    <li class="w3-padding">
                        <details>
                            <summary>Nasıl şeyi şey yapabilirim?</summary>
                            > Abi onu şeyden <em>şöyle</em> yapacan.
                        </details>
                    </li>
                </ul>


            </div>
        </div>


        <!-- The İletişim Section -->
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
            <h2 class="w3-wide w3-center">İletişim</h2>
            <p class="w3-opacity w3-center"><i>Numaramı istesen verirdim</i></p>
            <div class="w3-row w3-padding-32">
                <div class="w3-col m6 w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker" style="width:30px"></i> İZMİR BUCAAAAA<br>
                    <i class="fa fa-phone" style="width:30px"></i> Telefon: +00 151515<br>
                    <i class="fa fa-envelope" style="width:30px"> </i> E-posta: BucaLeeKral_35@hotmail.com<br>
                </div>
                <div class="w3-col m6">
                    <form action="/action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="İsim" required
                                    name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="E-posta" required
                                    name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Mesaj" required
                            name="Message">
                        <button class="w3-button w3-black w3-section w3-right" type="submit">Gönder</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Page Content -->
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>

    </footer>

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
