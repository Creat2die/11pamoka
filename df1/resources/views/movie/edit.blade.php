@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Movie</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('m_update', $movie)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title', $movie->title)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price', $movie->price)}}">
                        </div>
                          <div class="img-small mt-3">
                        @forelse($movie->getPhotos as $photo)
                        <div class="img">
                         <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="{{$photo->id}}" id="{{$photo->id}}-del-photo" name="delete_photo">
                    <label class="form-check-label" for="{{$photo->id}}-del-photo">
                    Delete photo
                    </label>
                </div>
                            <img src="{{$photo->url}}">
                        </div>
                        @empty
                        <h2>No photos yet</h2>
                        @endforelse
                        {{-- @if($movie->photo)
                        <div class="img-small">
                            <img src="{{$movie->photo}}">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" valua="1" id="del-photo" name="delete_photo">
                    <label class="form-check-label" for="del_photo">Delete photo</label>
                </div>
                @endif
                <div class="input-group mt-3">
                    <span class="input-group-text">Photo</span>
                    <input type="file" name="photo" class="form-control">
                </div>
                --}}

                <select name="category_id" class="form-select mt-3">
                    <option value="0">Choose category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == old('category_id', $movie->category_id)) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>

                @csrf
                @method('put')
                <button type="submit" class="btn btn-secondary mt-4">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
