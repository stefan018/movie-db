@extends('admin.layout')

@section('content')

	@foreach($series as $serie)
		<div>
			<h4>{{$serie->title}}</h4>
			<div>{{$serie->description}}</div>
		</div>
	@endforeach

@endsection