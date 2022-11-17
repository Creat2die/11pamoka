@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="{{route('r_index')}}" method="get">
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
            <form action="{{route('r_index')}}" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="text" name="s" class="form-control" placeholder="Search..." >
                                <button type="submit" class="input-group-text">Search</button>
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="{{route('r_index')}}" class="btn btn-secondary">Reset</a>
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
                <a href="{{route('r_edit', $restoran)}}" class="btn btn-primary m-2">Edit</a>
                <form action="{{route('r_delete', $restoran)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary m-2">DELETE</button>
                </form>
                <a href="{{route('r_show', $restoran)}}" class="btn btn-primary m-2">View</a>
            </div>
        </div>
    </div>

    @empty
    <li class="list-group-item">No Restourants found</li>
    @endforelse
</div>

@endsection
