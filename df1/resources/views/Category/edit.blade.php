@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-5">

            <div class="card">

                <div class="card-header">

                    <h2>Change Category</h2>

                </div>

                <div class="card-body">
                    <form action="{{route('c_edit', $category)}}" method="post">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">title</span>
                        <input type="text" class="form-control" name="title" value={{old('title', $category->title)}}>
                    </div>
                    {{-- <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Surtitle</span>
                        <input type="text" class="form-control" name="surtitle" value={{old('surtitle', $category->surtitle)}}>
                    </div> --}}


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
