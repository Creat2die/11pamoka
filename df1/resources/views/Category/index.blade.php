@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>categories</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($categories as $Category)
                        <li class="list-group-item">
                            <div class="categories-list">
                                <div class="content">
                                    <h2>{{$Category->title}}</h2>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('c_show', $Category)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('c_edit', $Category)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('c_delete', $Category)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No Categories found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $Categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection