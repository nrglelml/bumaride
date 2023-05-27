@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Yolculuk Arama</title>
    <style>
        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .search-icon {
            margin-right: 5px;
        }

        .date-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
<h1>Yolculuk Arama</h1>
<div class="search-container">
    <label for="kalkis-yeri">
        <img class="search-icon" src="public/images/icon1.jpg" alt="Kalkış Yeri">
        Kalkış Yeri:
    </label>
    <input type="text" id="kalkis-yeri" placeholder="Kalkış Yeri">
</div>
<div class="search-container">
    <label for="varis-yeri">
        <img class="search-icon" src="public/images/icon1.jpg" alt="Varış Yeri">
        Varış Yeri:
    </label>
    <input type="text" id="varis-yeri" placeholder="Varış Yeri">
</div>
<button class="date-button" onclick="showDatePicker()">Tarih Seç</button>

<!-- Burada tarih seçimi için kullanılabilecek bir arayüz yer alabilir. -->

<button onclick="ara()">Ara</button>

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
