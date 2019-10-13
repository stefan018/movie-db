@extends('layout')

@section('content')

	@include('errors')
	<form method="POST" action="{{route('movies.update', $movie->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<input type="text" name="title" value="{{old('title', $movie->title)}}">
		<textarea name="description">{{old('description', $movie->description)}}</textarea>
		<input type="number" name="duration" value="{{old('duration', $movie->duration)}}">
		<input type="date" name="release_date" value="{{old('release_date', $movie->release_date)}}">
		<input type="file" name="cover">
		<div class="genre-holder">
			@foreach($genres as $genre)
				<label for="genre">{{$genre->name}}</label>
				@if($movie->genres->contains('name', $genre->name))
					<input type="checkbox" name="genre[]" value="{{$genre->id}}" checked>
				@else
					<input type="checkbox" name="genre[]" value="{{$genre->id}}">
				@endif
			@endforeach
		</div>
		<button type="submit">Update</button>
	</form>

	<form method="POST" action="{{route('movies.destroy', $movie->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit">Delete</button>
	</form>
@endsection