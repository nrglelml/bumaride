@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Yeni Bir Seyahat Oluştur</div>
                <div class="card-body">
                    <form action="{{ route('createtrip') }}" method="POST">
                        @csrf
                         <div class="form-group">

                            <label for="departure">Kalkış Yeri:</label>
                            <input type="text" id="departure" name="departure" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="destination">Varış Yeri:</label>
                            <input type="text" id="destination" name="destination" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="date">Tarih:</label>
                            <input type="date" id="date" name="date" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Açıklama:</label>
                            <textarea id="description" name="description" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Seyahat Oluştur</button>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>

                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
