@extends('layout')

@section('content')

	<form method="POST" action="{{route('genres.update', $genre->id)}}">
		@csrf
		@method('PATCH')
		<input type="text" name="name" value="{{old('name', $genre->name)}}">
		<button type="submit">Update</button>
	</form>

	<form method="POST" action="{{route('genres.destroy', $genre->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit">Delete</button>	
	</form>

@endsection