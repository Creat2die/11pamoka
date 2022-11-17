@extends('layouts.app')

@section('content')


<div class="turinys">
    <div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h2 class="card-title">{{$dish->name}}</h2>
                <h4>{{$dish->price}}</h4>
                <h5>{{$dish->getRestoran->name}}</h4>
                <a href="{{url()->previous()}}" class="btn btn-primary m-2">Back</a>      
            </div>
        </div>
    </div>
</div>

@endsection
