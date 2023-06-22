@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Bildirimler</h1>
                <!-- Tab content -->
                <div id="trips" class="tabcontent">
                    <div class="card">
                        <div class="card-body">
                            @if ($notifications->isEmpty())
                                <p>Henüz bildiriminiz bulunmuyor.</p>
                            @else
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Fotoğraf</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Mesaj</th>
                                        <th>Kabul Et</th>
                                        <th>Reddet</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            @if ($notification->notifiable)
                                                <td>
                                                    @if ($notification->notifiable->profile_image)
                                                        <img src="{{ $notification->notifiable->profile_image }}">
                                                    @endif
                                                </td>
                                                <td>{{ $notification->notifiable->name }}</td>
                                            @endif
                                            <td>{{ $notification->data['message'] }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('notifications.accept', ['id' => $notification->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Kabul Et</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('notifications.deny', ['id' => $notification->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Reddet</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
