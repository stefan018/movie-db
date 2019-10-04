@extends('admin.layout')

@section('content')

@foreach($movies as $movie)
	<div>	
		<h4>{{$movie->title}}</h4>
		<div>{{$movie->description}}</div>
	</div>
@endforeach
@endsection