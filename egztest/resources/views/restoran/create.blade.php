@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-5">

            <div class="card">

                <div class="card-header">

                    <h2>New Restoran</h2>

                </div>

                <div class="card-body">
                    <form action="{{route('r_store')}}" method="post">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">City</span>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}" >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Adress</span>
                        <input type="text" class="form-control" name="adress" value="{{old('adress')}}" >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Workhours</span>
                        <input type="text" class="form-control" name="workhours" value="{{old('workhours')}}" >
                    </div>
                    
               
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
