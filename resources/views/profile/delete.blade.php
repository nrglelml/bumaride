@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hesabı Sil</h1>
        <div>
            <p>Hesabınızı silmek istediğinizden emin misiniz?</p>
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hesabı Sil</button>
            </form>
        </div>
    </div>
@endsection
