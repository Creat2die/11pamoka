@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Restoran</h2>
                </div>
                <div class="card-body">
                    <div class="restoran">
                        <h5>{{$restoran->title}}</h5>
                    </div>
                    <ul class="list-group">
                        @forelse($restoran->dishes as $dish)
                        <li class="list-group-item">
                            <div class="dishes-list">
                                <div class="content">
                                    <h2><span>Title: </span>{{$dish->title}}</h2>
                                    <h4><span>Price: </span>{{$dish->price}}</h4>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No dishes found</li>
                        @endforelse
                    </ul>
                    <div class="buttons mt-2">
                        @if(Auth::user()->role >= 10)
                        <form action="{{route('r_delete_dishes', $restoran)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete all dishes</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
