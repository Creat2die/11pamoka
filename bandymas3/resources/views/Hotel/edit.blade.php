@extends('layouts.app')

@section('content')

<div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">Edit Country: {{$country->name}}</h2>
                <form action="{{route('c_update', $country)}}" method="post">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Name</span>
                        <input type="text" class="form-control" name="name" value="{{old('name', $country->name)}}">
                    </div>

                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Seazon</span>
                        <input type="text" class="form-control" name="seazon" value="{{old('seazon', $country->seazon)}}">
                    </div>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-secondary mt-4">Update</button>
                </form>
                <a href="{{route('c_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>

@endsection
