@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Yolculuk Arama</title>
    </head>

    <body>
        <h1>Yolculuk Arama</h1>

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


        <script>
            function ara() {
                var kalkisYeri = document.getElementById("kalkis-yeri").value;
                var varisYeri = document.getElementById("varis-yeri").value;

                // Burada kalkış ve varış noktalarına göre arama işlemlerini yapabilirsiniz.
                // Örneğin, bu noktaları bir API'ye göndererek ilgili yolculukları alabilirsiniz.
                // Seçilen tarih bilgisini de dahil edebilirsiniz.
            }

            function showDatePicker() {
                // Burada tarih seçimi için bir arayüzün görüntülenmesini sağlayabilirsiniz.
            }
        </script>
    </body>

    </html>
@endsection
