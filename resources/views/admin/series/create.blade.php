@extends('admin.layout')

@section('content')

	@include('errors')
	<form method="POST" action="{{route('series.store')}}">
		@csrf
		<input type="text" name="title" value="{{old('title', 'Title')}}">
		<textarea name="description">{{old('description', 'Description')}}</textarea>
		<input type="number" name="duration" value="{{old('duration')}}">
		<input type="date" name="release_date" value="{{old('release_date', 'release date')}}">
		<input type="date" name="premiere" value="{{old('premiere', null)}}">
		<input type="number" name="seasons" value="{{old('seasons', 'Seasons')}}">
		<input type="number" name="episodes_per_season" value="{{old('episodes_per_season', 'Episodes per season')}}">
		<input type="text" name="cover" value="{{old('cover', 'Cover')}}">

		<div class="genre-holder">
			@foreach($genres as $genre)
				<label for="genre">{{$genre->name}}</label>
				<input type="checkbox" name="genre[]" value="{{$genre->id}}">
			@endforeach
		</div>
		<button type="submit">Submit</button>
	</form>

@endsection