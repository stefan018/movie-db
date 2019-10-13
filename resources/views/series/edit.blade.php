@extends('layout')

@section('content')

	@include('errors')
	<form method="POST" action="{{route('series.update', $serie->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<input type="text" name="title" value="{{old('title', $serie->title)}}">
		<textarea name="description">{{old('description', $serie->description)}}</textarea>
		<input type="number" name="duration" value="{{old('duration', $serie->duration)}}">
		<input type="date" name="release_date" value="{{old('release_date', $serie->release_date)}}">
		<input type="date" name="premiere" value="{{old('premiere', $serie->premiere)}}">
		<input type="number" name="seasons" value="{{old('seasons', $serie->seasons)}}">
		<input type="number" name="episodes_per_season" value="{{old('episodes_per_season', $serie->episodes_per_season)}}">
		<input type="file" name="cover">

		<div class="genre-holder">
			@foreach($genres as $genre)
				<label>{{$genre->name}}</label>
				@if($serie->genres->contains('name', $genre->name))
					<input type="checkbox" name="genre[]" value="{{$genre->id}}" checked>
				@else
					<input type="checkbox" name="genre[]" value="{{$genre->id}}">
				@endif
			@endforeach
		</div>
		<button type="submit">Update</button>
	</form>

	<form method="POST" action="{{route('series.destroy', $serie->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit">Delete</button>
	</form>
@endsection