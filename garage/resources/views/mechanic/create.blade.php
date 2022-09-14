@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-5">

            <div class="card">

                <div class="card-header">

                    <h2>New Mechanic</h2>

                </div>

                <div class="card-body">
                    <form action="{{route('m_store')}}" method="post">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Name</span>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Surname</span>
                        <input type="text" class="form-control" name="surname" value="{{old('surname')}}" >
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
