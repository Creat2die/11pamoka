@extends('layouts.app')

@section('content')



<div class="turinys">
    @forelse($countries as $country)

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$country->name}} {{$country->season}}
            <span class="badge badge-primary badge-pill">quantity</span>
        </li>
    </ul>

    @empty
    <div class="col-5 ">
        <li class="list-group-item">No Restourants found</li>
    </div>
    @endforelse
</div>

@endsection
