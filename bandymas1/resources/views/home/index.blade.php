@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-6">
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
                            <button type="submit" class="input-group-text mt-1">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form action="{{route('home')}}" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="text" name="s" class="form-control" placeholder="Search...">
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



<div class="turinys">

    @forelse($restorans as $restoran)

    <div class="korta">
        <div class="card" style="width: 18rem;">

            <div class="card-body">
                <h2 class="card-title2">{{$restoran->name}}</h2>
                <h4>{{$restoran->city}}</h4>
                <h5>{{$restoran->adress}}</h4>
                    <h5>{{$restoran->workhours}}</h4>
                        <h5>Patiekalų: {{$restoran->getDishes->count()}}</h5>
                        <h4><span>Rating: </span>{{$restoran->rating ?? 'no rating'}}</h4>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('r_show', $restoran)}}" class="btn btn-primary m-2">View</a>
                            </div>
                            <div class="buttons col-7 mt-2 ms-1">
                                <form action="{{route('rate', $restoran)}}" method="post">
                                    <select class="p-2" name="rate">
                                        @foreach(range(1, 10) as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-info mx-2">Rate</button>
                                </form>
                            </div>

                        </div>
                        

            </div>
        </div>
    </div>

    @empty
    <li class="list-group-item">No Restourants found</li>
    @endforelse
</div>

@endsection
