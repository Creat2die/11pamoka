@extends('home')

@section('title')
    SuperFUN
@endsection
@section('fun')

    @include('kitkas.bu')

cia atejau 


@if($abc == 'keturi')


<h1> Labai gerai </h1>

@else


<h1> Nu nelabai gerai </h1>

@endif


@forelse($mas as $value)
    <h2>{{$value}}</h2>
@empty
    <h2>Niekoner</h2>
@endforelse



@endsection