@extends('layouts.app')

@section('content')

<div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">New Hotel</h2>
                <form action="{{route('h_store')}}" method="post">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Name</span>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>

                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Term</span>
                        <input type="text" class="form-control" name="term" value="{{old('term')}}">
                    </div>
                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Price</span>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>

                    @error('country_id')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Country</span>
                        <select name="country_id">
                        @foreach($countries as $country)
                       <option value="{{$country->id}}" @if($country->id == old('country_id')) selected @endif>{{$country->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                </form>
                <a href="{{route('h_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>


@endsection
