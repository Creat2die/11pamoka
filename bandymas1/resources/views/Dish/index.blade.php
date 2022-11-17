@extends('layouts.app')

@section('content')



<form action="{{route('d_index')}}" method="get">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <select name="rest" class="form-select mt-1">
                    <option value="0">All</option>
                    @foreach($restorans as $restoran)
                    <option value="{{$restoran->id}}" @if($rest==$restoran->id) selected @endif>{{$restoran->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <select name="sort" class="form-select mt-1">
                    <option value="0">All</option>
                    @foreach($sortSelect as $option)
                    <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1">
                <button type="submit" class="input-group-text mt-1">Filter</button>
            </div>
            <div class="col-1">
                <a href="{{route('d_index')}}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </div>
</form>




<div class="turinys">
    @forelse($dishes as $dish)

    <div class="korta">
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h2 class="card-title">{{$dish->name}}</h2>
                <h4>{{$dish->getRestoran->name}}</h4>
                @if($dish->getPhotos()->count())
                <div><img class="fit-picture" src="{{$dish->lasImageUrl()}}" height="150"></div>
                @endif
                <h4>{{$dish->price}} Eur</h4>
                <h5>{{$dish->workhours}}</h4>
                <a href="{{route('d_edit', $dish)}}" class="btn btn-primary m-2">Edit</a>
                <form action="{{route('d_delete', $dish)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary m-2">DELETE</button>
                </form>
                <a href="{{route('d_show', $dish)}}" class="btn btn-primary m-2">View</a>
            </div>
        </div>
    </div>

    @empty
    <div class="col-5 turinys">
    <li class="list-group-item">No Restourants found</li>
    </div>
    @endforelse
</div>

@endsection
