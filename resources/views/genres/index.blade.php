@extends('layout')

@section('content')
	@foreach($genres as $genre)
		<p>{{$genre->name}}</p>
	@endforeach
	<form method="POST" action="{{route('genres.store')}}">
		@csrf
		<label>Enter genre</label>
		<input type="text" name="name" value="{{old('name')}}">
		<button type="submit">Create Genre</button>
	</form>
@endsection