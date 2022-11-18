@extends('layouts.app')

@section('content')

<div style=" padding:10px">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <h2>Hotel name</h2>
    <h4>Term of vacation</h4>

</ul>
@forelse($hotels as $hotel)

<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <h4><a href="{{route('h_show', $hotel)}}">{{$hotel->name}}</a></h4>
    <h4>{{$hotel->getCountry->name}}</h4>
 
        <a href="{{route('h_edit', $hotel)}}" class="btn btn-primary m-2">Edit</a>
                <form action="{{route('h_delete', $hotel)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary m-2">DELETE</button>
                </form>
                <a href="{{route('h_show', $hotel)}}" class="btn btn-primary m-2">View</a>
      <h6>{{$hotel->term}}</h6>
  </li>
  </li>
</ul>
    @empty
    <li class="list-group-item">No Hotels found</li>
    @endforelse

</div>
@endsection
