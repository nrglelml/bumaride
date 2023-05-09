@extends('layouts.app')

@section('content')
    HESAP YÖNETİM KISMI GİRİLECEK
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bilgilendirme') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Giriş Yaptın!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
