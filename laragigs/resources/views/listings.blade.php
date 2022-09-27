<h1>{{ $heading}}</h1>


@foreach($listings as $listing)
    <h2>{{$listing['title']}}</h2>
    <h2>{{$listing['description']}}</h2>
@endforeach
