@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Truck</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('t_update', $truck)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Maker</span>
                            <input type="text" name="maker" class="form-control" value="{{old('maker', $truck->maker)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Plate</span>
                            <input type="text" name="plate" class="form-control" value="{{old('plate', $truck->plate)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Make Year</span>
                            <input type="text" name="make_year" class="form-control" value="{{old('make_year', $truck->make_year)}}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Notices</span>
                            <textarea class="form-control" name="mechanic_notices">{{old('mechanic_notices', $truck->mechanic_notices)}}</textarea>
                        </div>
                        <select name="mechanic_id" class="form-select mt-3">
                            <option value="0">Choose mechanic</option>
                            @foreach($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}" @if($mechanic->id == old('mechanic_id', $truck->mechanic_id)) selected @endif>{{$mechanic->name}} {{$mechanic->surname}}</option>
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