@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                </div>
                <div class="card-body">
                    <div class="tag">
                        <h5>{{$tag->title}}</h5>
                        <h5>{{$tag->surtitle}}</h5>
                    </div>
                    <ul class="list-group">
                        @forelse($tag->getMovies as $movie)
                        <li class="list-group-item">
                            <div class="movies-list">
                                <div class="content">
                                    <h2><span>Title: </span>{{$movie->title}}</h2>
                                    <h4><span>Price: </span>{{$movie->price}}</h4>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No movies found</li>
                        @endforelse
                    </ul>
                    <div class="buttons mt-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
