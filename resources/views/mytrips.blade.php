@extends('layouts.app')

<style>
    .buttons {
        width: 50%;
        overflow: hidden;
        background-color: #f1f1f1;
    }


    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: auto;
        margin: 0 auto;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .tabcontent {
        animation: fadeEffect 1s;
        /* Fading effect takes 1 second */
    }

    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Tab links -->
                <div class="tab">
                    <button id="defaultOpen" class="tablinks buttons" onclick="openTab(event, 'trips')">Yolculuklarım</button>
                    <button class="tablinks buttons" onclick="openTab(event, 'history')">Geçmiş Seferler</button>

                </div>

                <!-- Tab content -->
                <div id="trips" class="tabcontent">
                    <div class="card">
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
                                    @foreach ($trips as $trip)
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

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="history" class="tabcontent">
                    <div class="card">
                        Burası geçmiş olanlar olacak tablodan çekmeyi bilmiyorum
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
                                    @foreach ($trips as $trip)
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
                                                    @if (session('success'))
                                                        <div class="form-group row mt-3">
                                                            <div class="col-md-6 offset-md-4">
                                                                <div class="alert alert-success">{{ session('success') }}
                                                                </div>
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
    </div>

    <script>
        document.getElementById("defaultOpen").click();

        function openTab(evt, tabName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
