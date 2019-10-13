@extends('layout')

@section('content')

	@foreach($cast as $celeb)
		<h4><a href="{{route('cast.edit', $celeb->id)}}">{{$celeb->name}}</a></h4>
	@endforeach
@endsection