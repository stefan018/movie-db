@extends('layout')

@section('content')
	<h3>Serie results</h3>
	@foreach($series as $serie)
		<h4>{{$serie->title}}</h4>
	@endforeach
@endsection