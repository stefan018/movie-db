@extends('layout')

@section('content')

	@foreach($series as $serie)
		<div>
			<h4><a href="{{route('series.edit', $serie->id)}}">{{$serie->title}}</a></h4>
			<div>{{$serie->description}}</div>
		</div>
	@endforeach

@endsection