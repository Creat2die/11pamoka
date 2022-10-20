@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Restorans</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($restorans as $restoran)
                        <li class="list-group-item">
                            <div class="restorans-list">
                                <div class="content">
                                    <h2>{{$restoran->title}} </h2>
                                    <p>{{$restoran->city}} </p>
                                    <p>{{$restoran->adress}} </p>
                                    <p>{{$restoran->workhours}} </p>
                                    {{-- <small>[{{$restoran->dishes()->count()}}]</small> --}}
                                </div>
                                
                                <div class="buttons">
                                    <a href="{{route('r_show', $restoran)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >= 10)
                                    <a href="{{route('r_edit', $restoran)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('r_delete', $restoran)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No Restorans found</li>
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