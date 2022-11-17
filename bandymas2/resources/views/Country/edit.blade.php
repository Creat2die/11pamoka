@extends('layouts.app')

@section('content')


<div class="turinys justify-content-center">

    <div class="korta">
        <div class="card" style="width: 30rem;">
            <div class="card-body">

                <h2 class="card-title">Edit Dish: {{$dish->name}}</h2>
                <form action="{{route('d_update', $dish)}}" method="post" enctype="multipart/form-data">
                    @error('name')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input type="text" class="form-control" name="name" value="{{old('name', $dish->name)}}">
                    </div>

                    @error('price')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Price</span>
                        <input type="text" class="form-control" name="price" value="{{old('price', $dish->price)}}">
                    </div>
                    <div data-clone class="input-group mt-3">
                        <span class="input-group-text">Photo</span>
                        <input type="file" name="photo[]" multiple class="form-control">
                    </div>
                    @forelse($dish->getPhotos as $photo)
                    <div class="img">
                        <label for="{{$photo->id}}-del-photo">x</label>
                        <input type="checkbox" value="{{$photo->id}}" id="{{$photo->id}}-del-photo" name="delete_photo[]">
                        <img src="{{$photo->url}}">
                    </div>
                    @empty
                    <h2>No photos yet</h2>
                    @endforelse

                    @error('restoran_id')
                    <div style="color:crimson">{{$message}}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Restoran</span>
                        <select name="restoran_id">
                            @foreach($restorans as $restoran)
                            <option value="{{$restoran->id}}" @if($restoran->id == old('restoran_id')) selected @endif>{{$restoran->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-secondary mt-4">Update</button>
                </form>
                <a href="{{route('d_index')}}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
