@extends('layouts.app')

@section('content')


<div class="turinys justify-content-center">

    <div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">New Restourant</h2>
                <form action="{{route('r_store')}}" method="post">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>

                    @error('city')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">City</span>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}">
                    </div>

                    @error('adress')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Adress</span>
                        <input type="text" class="form-control" name="adress" value="{{old('adress')}}">
                    </div>

                    @error('workhours')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Work Hours</span>
                        <input type="text" class="form-control" name="workhours" value="{{old('workhours')}}">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                </form>
                <a href="{{route('r_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
