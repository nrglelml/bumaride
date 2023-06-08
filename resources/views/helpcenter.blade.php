@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Yardım Merkezi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/helpcenter.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
<div class="section">
    <div class="container">
        <div class="content-section">
            <div class="title">
                <h1>Sıkça Sorulan Sorular S.S.S</h1>
            </div>
            <div class="content">
                <div class="faq-container">
                    <div class="faq-item">
                        <h3>Yolculuk paylaşımına nasıl başlayabilirim?</h3>
                        <p>BumaRide ile yolculuk paylaşımı çok kolay ve ücretsizdir! Tek yapman gereken aşağıdaki adımları izlemektir:</p>
                        <ol>
                            <li>Öncelikle hesabını oluştur veya giriş yap.</li>
                            <li>"Yolculuk Oluştur" butonuna tıkla.</li>
                            <li>Gerekli bilgileri doldur (kalkış yeri, varış yeri, tarih, saat, vb.).</li>
                            <li>Yolculuğunu yayınla ve diğer kullanıcıların seninle iletişime geçmesini bekle.</li>
                        </ol>
                    </div>

                    <div class="faq-item">
                        <h3>Hesabımı nasıl silebilirim?</h3>
                        <p>Hesabını silmek istersen aşağıdaki adımları takip edebilirsin:</p>
                        <ol>
                            <li>Hesabınla giriş yap.</li>
                            <li>Ayarlar veya Profil bölümüne git.</li>
                            <li>Hesabı Sil seçeneğine tıkla.</li>
                            <li>Onaylama adımlarını takip et ve hesabını kalıcı olarak sil.</li>
                        </ol>
                    </div>

                    <div class="faq-item">
                        <h3>Yolculuk paylaşırken nelere dikkat etmeliyim?</h3>
                        <p>Yolculuk paylaşırken aşağıdaki noktalara dikkat etmek önemlidir:</p>
                        <ul>
                            <li>Doğru ve eksiksiz bilgiler sağlamak.</li>
                            <li>Güvenlik önlemlerini almak ve gerekli lisans veya belgeleri kontrol etmek.</li>
                            <li>Yolculuk kurallarını ve politikalarını okumak ve uygulamak.</li>
                            <li>Yolcularla iletişimde olmak ve varış noktasına ulaşmalarını sağlamak.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="social-container">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
