@extends('layouts.app')

@section('content')

<div class="card" style="width: 30rem;">

            <div class="card-body">
                <h2 class="card-title">{{$hotel->name}}</h2>
                <h4>{{$hotel->term}}</h4>
               

                <a href="{{url()->previous()}}" class="btn btn-primary m-2">Back to list</a>
            </div>
        </div>

@endsection
