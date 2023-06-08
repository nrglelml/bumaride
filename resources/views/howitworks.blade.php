@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>BumaRide Nasıl Çalışır</title>
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
<h1 class="o-custom-page__title c-post__title">BumaRide Nasıl Çalışır</h1>
<div class="section">

    <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
            <h3>Ücretsiz Hesap Oluştur</h3>
            <p>BumaRide platformunda yolculuk paylaşımı yapmak için ücretsiz bir hesap oluşturman gerekmektedir. Hesap oluşturmak için kişisel bilgilerini girmen ve bir kullanıcı adı ve şifre seçmen yeterlidir.</p>
           <p>Hesap Oluşturmak için <a href="{{route('register')}}">tıklayın.</a> </p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
            <h3>Yolculuk Paylaş</h3>
            <p>Hesabını oluşturduktan sonra, "Yolculuk Oluştur" butonuna tıklayarak planladığın yolculuğun detaylarını girebilirsin. Kalkış yeri, varış yeri, tarih, saat gibi bilgileri doldurarak yolculuğunu yayınla.</p>
            <p>Yolculuk Oluşturmak  için <a href="{{route('createtrip')}}">tıklayın.</a> </p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
            <h3>Yolcuların Seninle İletişime Geçsin</h3>
            <p>Yolculuğunu yayınladıktan sonra, diğer kullanıcılar seninle iletişime geçebilirler. İletişim bilgilerini paylaşabilir ve yolcuların rezervasyon yapmasını sağlayabilirsin.</p>
            <p>İletişim için <a href="{{route('index')}}">tıklayın.</a> </p>
        </div>
    </div>
    <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
            <h3>Yolculuğunu Gerçekleştir</h3>
            <p>Yolcular rezervasyon yaptıktan sonra, belirlenen tarih ve saatte yolculuğunu gerçekleştir. Yolculuk sırasında güvenlik kurallarına uyman ve yolcuların güvenliğini sağlaman önemlidir.</p>
        </div>
    </div>
</div>
</body>
</html>
@endsection
