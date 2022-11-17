@extends('layouts.app')

@section('content')


<div class="turinys justify-content-center">

    <div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">Edit Restourant: {{$restoran->name}}</h2>
                <form action="{{route('r_update', $restoran)}}" method="post">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input type="text" class="form-control" name="name" value="{{old('name', $restoran->name)}}">
                    </div>

                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">City</span>
                        <input type="text" class="form-control" name="city" value="{{old('city', $restoran->city)}}">
                    </div>

                    @error('adress')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Adress</span>
                        <input type="text" class="form-control" name="adress" value="{{old('adress', $restoran->adress)}}">
                    </div>

                    @error('workhours')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Work Hours</span>
                        <input type="text" class="form-control" name="workhours" value="{{old('workhours', $restoran->workhours)}}">
                    </div>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-secondary mt-4">Update</button>
                </form>
                <a href="{{route('r_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
