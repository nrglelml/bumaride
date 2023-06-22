@extends('layouts.app')
@section('content')
    <div class="right message">
        <p>{{$message}}</p>
        <img src="{{ Auth()->user()->profile_image }}" alt="Profile picture">
    </div>
@endsection
