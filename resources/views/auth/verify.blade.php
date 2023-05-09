@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Telefon numaranı doğrula') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Telefon numarana yeni bir kod gönderilecek') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce lütfen bir doğrulama bağlantısı için telefon numaranızı kontrol edin.') }}
                    {{ __('Kodu Alamadıysan') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('başka kod istemek için buraya tıklayın') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
