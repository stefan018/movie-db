@extends('layout')

@section('content')
<div class="search-movies">	
	<h2>Movies matching your search</h2>
	@foreach($movies as $movie)
		<h4>{{$movie->title}}</h4>
	@endforeach
</div>
<div class="search-series">
	<h2>Series mathcing your search</h2>
	@foreach($series as $serie)
		<h4>{{$serie->title}}</h4>
	@endforeach
</div>
<div class="search-cast">
	<h2>Cast mathcing your search</h2>
	@foreach($cast as $celeb)
		<h4>{{$celeb->name}}</h4>
	@endforeach
</div>
@endsection