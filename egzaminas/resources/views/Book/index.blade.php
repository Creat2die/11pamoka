@extends('layouts.app')

@section('content')



<div class="turinys">
    @forelse($books as $book)

    <div class="korta">
        <div class="card" >

            <div class="card-body">
                <h2 class="card-title">{{$book->title}}</h2>
                <h4><b>Category:</b> {{$book->getCategory->name}}</h4>
                <h4><b>ISBN:</b> {{$book->ISBN}}</h4>
                <h4><b>Pages:</b> {{$book->pages}}</h4>
                <h5><b>Description:</b><br> {{$book->description}}</h4>
                <div>
                <a href="{{route('b_edit', $book)}}" class="btn btn-primary m-2">Edit</a>
                <form action="{{route('b_delete', $book)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary m-2">DELETE</button>
                </form>
                <a href="{{route('b_show', $book)}}" class="btn btn-primary m-2">View</a>
                </div>
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
