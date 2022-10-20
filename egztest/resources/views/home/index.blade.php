@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12 p-0 mb-2">
            <div class="card">
                <div class="card-header">
                    <h2>Dish</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-7">
                                <form action="{{route('home')}}" method="get">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-5">
                                                <select name="sort" class="form-select mt-1">
                                                    <option value="0">All</option>
                                                    @foreach($sortSelect as $option)
                                                    <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="input-group-text mt-1">SORT</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-7">
                                <form action="{{route('home')}}" method="get">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="s" class="form-control" value="{{$s}}">
                                                    <button type="submit" class="input-group-text">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('home')}}" class="btn btn-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($dishes as $dish)
                <li class="list-group-item">
                    <div class="dishes-list">
                        <div class="content">
                            <h2><span>Title: </span>{{$dish->title}}</h2>
                            <h4><span>Price: </span>{{$dish->price}}</h4>
                            

                            @if($dish->getPhotos()->count())
                            <h5><a href="{{$dish->lastImageUrl()}}" target="_BLANK">Photos: {{$dish->getPhotos()->count()}}</a></h5>
                            <div><img class="fit-picture" src="{{$dish->lastImageUrl()}}" height="100"></div>
                            @endif
                            <h4><span>Rating: </span>{{$dish->rating ?? 'no rating'}}</h4>
                        </div>
                        <div class="buttons">
                            <form action="{{route('rate', $dish)}}" method="post">
                                <select name="rate">
                                    @foreach(range(1, 10) as $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-info">Rate</button>
                            </form>
                        </div>
                    </div>
                    <div class="coments">

                        <ul class="list-group">
                            @forelse($dish->getComents as $coment)
                            <li class="list-group-item">
                                <p>{{$coment->post}}</p>
                            </li>
                            @empty
                            <li class="list-group-item">
                                No comment.
                            </li>
                            @endforelse


                            <form action="{{route('coment', $dish)}}" method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Coment</span>
                                    <textarea name="post" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Add coment</button>
                                @csrf
                    </div>
                </li>
                @empty
                <li class="list-group-item">No dishes found</li>
                @endforelse
            </ul>
        </div>
        <div class="me-3 mx-3 mt-3">
            {{ $dishes->links() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection
