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
                                <th>Yolcu Sayısı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trips as $trip)
                                <tr>
                                    <td>{{ $trip->departure }}</td>
                                    <td>{{ $trip->destination }}</td>
                                    <td>{{ $trip->date }}</td>
                                    <td>{{ $trip->description }}</td>
                                    <td>{{ $trip->people_num }}</td>
                                    <td>
                                        <form action="{{ route('mytrips.destroy', $trip->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Kaldır</button>
                                            @if(session('success'))
                                                <div class="form-group row mt-3">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="alert alert-success">{{ session('success') }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </td>
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
