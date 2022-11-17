@extends('layouts.app')

@section('content')
<div style=" padding:10px">
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <h2>Šalis</h2>
    <h4>Sezonas</h4>

</ul>
@forelse($countries as $country)

<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <h4><a href="{{route('c_show', $country)}}">{{$country->name}}</a></h4>
        <a href="{{route('c_edit', $country)}}" class="btn btn-primary m-2">Edit</a>
                <form action="{{route('c_delete', $country)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary m-2">DELETE</button>
                </form>
                <a href="{{route('c_show', $country)}}" class="btn btn-primary m-2">View</a>
  <h6>{{$country->seazon}}</h6>
  </li>
  </li>
</ul>
    @empty
    <li class="list-group-item">No Restourants found</li>
    @endforelse
</div>

@endsection
