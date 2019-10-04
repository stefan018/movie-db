@extends('admin.layout')

@section('content')

	@include('errors')
	<form method="POST" action="{{route('movies.store')}}">
		@csrf
		<input type="text" name="title" placeholder="Enter title" value="{{old('title')}}">
		<textarea name="description" placeholder="Enter description">@if(old('description')){{old('description')}}@endif</textarea>
		<input type="number" name="duration" value="{{old('duration')}}">
		<input type="date" name="release_date" value="{{old('release_date')}}">
		<input type="text" name="cover" placeholder="cover" value="{{old('cover')}}">
		<div class="genre-holder">
			@foreach($genres as $genre)
				<label for="genre">{{$genre->name}}</label>
				<input type="checkbox" name="genre[]" value="{{$genre->id}}">
			@endforeach
		</div>
		<button type="submit">Submit</button>
	</form>

@endsection