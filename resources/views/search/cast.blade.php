@extends('layout')

@section('content')
	<h3>Cast results</h3>
	@foreach($cast as $celeb)
		<h4>{{$celeb->name}}</h4>
	@endforeach
@endsection