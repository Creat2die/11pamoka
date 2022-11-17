@extends('layouts.app')

@section('content')


<div class="turinys">
    <div class="korta">
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h2 class="card-title">{{$restoran->name}}</h2>
                <h4>{{$restoran->city}}</h4>
                <h5>{{$restoran->adress}}</h4>
                <h5>{{$restoran->workhours}}</h4>
                
                <h2 class="card-title">Patiekai:</h2>
                <ul>
                @forelse($restoran->getDishes as $dish )
                <div> 
                @if($dish->getPhotos()->count())
                <div><img class="fit-picture" src="{{$dish->lasImageUrl()}}" height="150"></div>
                @endif
                <a href="{{route('d_show', $dish)}}">{{$dish->name}}</a>
                <p> {{$dish->price}}Eur</p>
                </div>
              
                @empty
                    <div>Nėra patiekalų, KOLKAS</div>
                @endforelse
                </ul>
                <a href="{{url()->previous()}}" class="btn btn-primary m-2">Back to list</a>
            </div>
        </div>
    </div>
</div>

@endsection
