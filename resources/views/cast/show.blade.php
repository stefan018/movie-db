@extends('layout')

@section('content')
	<h4>{{$celeb->name}}</h4>
	<div>{{$celeb->biography}}</div>
	<div>
		<p>{{$celeb->gender}}</p>
		<p>{{$celeb->birth_date}}</p>
		<p>{{$celeb->birth_place}}</p>
	</div>

@endsection