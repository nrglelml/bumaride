@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>BumaRide - Hakkımızda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            padding: 20px;
        }

        .section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .section img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="o-custom-page__title c-post__title">Hakkımızda</h1>
<div class="section">

    <p>Macera yolculuklarımızı daha kolay ve daha eğlenceli hale getirmek için bir site yapmaya karar verdik.</p>
    <p>BumaRide, kullanıcıların yolculuklarını paylaşarak daha sürdürülebilir ve ekonomik bir ulaşım seçeneği sunmayı hedefleyen bir platformdur. 2023 yılında kurulan BumaRide, seyahat edenlerin boş koltukları paylaşarak diğer yolculara uygun, güvenli ve dostça bir yolculuk deneyimi sunma fikriyle ortaya çıktı.</p>
    <p>Amacımız, yolcuların güvenli ve uygun maliyetli bir şekilde seyahat etmelerini sağlamak ve aynı zamanda trafik yoğunluğunu ve karbon salınımını azaltmaya katkıda bulunmaktır.</p>
    <p>BumaRide, kullanıcıların yolculuklarını yayınlamalarına, rezervasyon yapmalarına ve iletişim kurmalarına olanak tanır. Kullanıcılar, yolculuklarını planlamak, boş koltuklarını paylaşmak ve yeni insanlarla tanışmak için platformu kullanabilirler.</p>
    <p>Ekip olarak, insanların daha sürdürülebilir bir ulaşım seçeneği sunmalarını teşvik etmek ve paylaşım ekonomisine katkıda bulunmak için çalışıyoruz.</p>
    <p style="text-align: center; font-size: 24px; margin-bottom: 10px; opacity: 0.7;">Soldan sağa:</p>
    <p style="text-align: center;"><strong style="font-size: 18px; opacity: 0.8;">Mehmet Emin Çakın, (Grup Lideri); Nurgül Elmalı; Deniz Akbay</strong></p>
    <div style="text-align: center;">
        <img decoding="async" loading="lazy" src="{{ asset('images/mehmet.jpg') }}" alt="Mehmet Emin Çakın" width="100" height="80" style="display: inline-block;">
        <img decoding="async" loading="lazy" src="{{ asset('images/nurgul.png') }}" alt="Nurgül Elmalı" width="100" height="80" style="display: inline-block;">
        <img decoding="async" loading="lazy" src="{{ asset('images/deniz.jpg') }}" alt="Deniz Akbay" width="100" height="80" style="display: inline-block;">
    </div>

    <p style="text-align: center;"><strong>Sende Hikayemizin parçası ol!</strong></p>
</div>
</body>
</html>
@endsection
