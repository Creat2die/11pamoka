@extends('layouts.app')

@section('content')

<div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">New Country</h2>
                <form action="{{route('c_store')}}" method="post">
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
                        <span class="input-group-text" id="basic-addon3">Seazon</span>
                        <input type="text" class="form-control" name="seazon" value="{{old('seazon')}}">
                    </div>

                    
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                </form>
                <a href="{{route('c_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>


@endsection
