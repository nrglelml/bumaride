@extends('layouts.app')
@section('content')
    <div class="left message">
        <img src="{{ Auth()->user()->profile_image }}" alt="Avatar">
        <p>{{$message}}</p>
    </div>
@endsection
