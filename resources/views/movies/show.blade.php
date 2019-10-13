@extends('layout')

@section('content')

	<h3>{{$movie->title}}</h3>
	<div>
		{{$movie->description}}
	</div>

@endsection