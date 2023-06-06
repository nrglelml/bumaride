@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Bizimle İletişime Geç</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

    <style>
        .my-div {
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

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
            background: url("{{ url('images/bg.jpg') }}") no-repeat center;
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
            box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
        }

        .my-div .left {
            background: url("{{ url('images/bg.jpg') }}") no-repeat center;
            background-size: cover;
            height: 100%;
        }

        .my-div .right {
            padding: 25px 40px;
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

        .my-div .btn:hover {
            background-color: #3f51b5;
        }

        .my-div .field:focus {
            border: 2px solid rgba(30,85,250,0.47);
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
            <div class="left"></div>
            <div class="right">
                <h2>Bizimle İletişime Geç</h2>
                <form action="{{ route('send') }}" method="POST">
                    @csrf
                    <input type="text" class="field" placeholder="Adınız" name="name">
                    <input type="text" class="field" placeholder="Soyadınız" name="surname">
                    <input type="text" class="field" placeholder="Email'iniz" name="email">
                    <input type="text" class="field" placeholder="Konu" name="subject">
                    <textarea name="message" class="field" placeholder="Mesajınız"></textarea>
                    <button type="submit" class="btn">Gönder</button>
                </form>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div>
                    @if(session('error'))
                        <div class="invalid-feedback" role="alert>{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
