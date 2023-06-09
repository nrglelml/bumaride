@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Yolculuklarım</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kalkış Yeri</th>
                                <th>Varış Yeri</th>
                                <th>Tarih</th>
                                <th>Açıklama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trips as $trip)
                                <tr>
                                    <td>{{ $trip->departure }}</td>
                                    <td>{{ $trip->destination }}</td>
                                    <td>{{ $trip->date }}</td>
                                    <td>{{ $trip->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
