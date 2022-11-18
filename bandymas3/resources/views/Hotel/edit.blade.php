@extends('layouts.app')

@section('content')
<div style="padding: 20px">
<div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">Edit Hotel: {{$hotel->name}}</h2>
                <form action="{{route('h_update', $hotel)}}" method="post">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Name</span>
                        <input type="text" class="form-control" name="name" value="{{old('name', $hotel->name)}}">
                    </div>

                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Term</span>
                        <input type="text" class="form-control" name="term" value="{{old('term', $hotel->term)}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Restoran</span>
                        <select name="country_id">
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id == old('country_id')) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-secondary mt-4">Update</button>
                </form>
                <a href="{{route('h_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
</div>

@endsection
