@extends('layouts.app')

@section('content')


<div class="turinys justify-content-center">

    <div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">New Dish</h2>
                <form action="{{route('d_store')}}" method="post" enctype="multipart/form-data">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Name</span>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>

                    @error('price')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Price</span>
                        <input type="text" class="form-control" name="price" value="{{old('city')}}">
                    </div>

                    @error('restoran_id')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Restoran</span>
                        <select name="restoran_id">
                        @foreach($restorans as  $restoran)
                       <option value="{{$restoran->id}}" @if($restoran->id == old('restoran_id')) selected @endif>{{$restoran->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div data-clone class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo[]" multiple class="form-control">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                </form>
                <a href="{{route('d_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
