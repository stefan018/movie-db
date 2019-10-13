@extends('layout')

@section('content')
	<h3>Movie results</h3>
	@foreach($movies as $movie)
		<h4>{{$movie->title}}</h4>
	@endforeach
@endsection