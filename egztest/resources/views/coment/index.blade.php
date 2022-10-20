@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Comments</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($dishes as $dish)
                        <li class="list-group-item">
                            <div >
                                <div class="content">
                                    <h2>{{$dish->title}}<small>[{{$dish->getComents()->count()}}]</small> </h2>
                                    
                                </div>
                                <ul class="list-group">
                                    @forelse($dish->getComents as $coment)
                                    <li class="list-group-item">
                                        <div>{{$coment->post}}
                                        </div>
                                        <div class="buttons">
                                            @if(Auth::user()->role >= 10)
                                            <form action="{{route('c_delete', $coment)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            @endif
                                        </div>
                                    </li>
                                    @empty
                                    <li class="list-group-item">No comments
                                    </li>
                                    @endforelse

                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No Categories found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{ $dishes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
