@extends('layout')

@section('content')

@foreach($movies as $movie)
	<div>	
		<h4><a href="{{route('movies.edit', $movie->id)}}">{{$movie->title}}</a></h4>
		<div>{{$movie->description}}</div>
	</div>
@endforeach
@endsection