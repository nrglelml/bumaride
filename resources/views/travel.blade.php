@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Yolculuklar</h1>
                @if(count($travel) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Yolculuk Sahibi</th>
                            <th>Kalkış Yeri</th>
                            <th>Varış Yeri</th>
                            <th>Tarih</th>
                            <th>Açıklama</th>
                            <th>Kişi Sayısı</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($travel as $travel)
                            <tr>
                                <td>{{ $travel->user->name }}</td>
                                <td>{{ $travel->departure }}</td>
                                <td>{{ $travel->destination }}</td>
                                <td>{{ $travel->date }}</td>
                                <td>{{ $travel->description }}</td>
                                <td>{{ $travel->people_num }}</td>
                                <td>
                                    <form action="{{ route('create.notification',  ['id' => $travel->id]) }}" method="POST">

                                    @csrf
                                        <button type="submit" class="btn btn-primary">Talep Oluştur</button>
                                    </form>
                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger mt-3">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @endif
            </div>
        </div>
    </div>
@endsection
