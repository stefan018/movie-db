@extends('layout')

@section('content')

	@include('errors')
	<form method="POST" action="{{route('movies.update', $movie->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="{{old('title', $movie->title)}}">
		</div>
		<div class="form-group">
			<label for="description">Description:</label>
			<textarea name="description" class="form-control">{{old('description', $movie->description)}}</textarea>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="duration">Duration:</label>
					<input type="number" name="duration" class="form-control" value="{{old('duration', $movie->duration)}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="release_date">Release date:</label>
					<input type="date" name="release_date" class="form-control" value="{{old('release_date', $movie->release_date)}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="cover">Cover:</label>
					<input type="file" name="cover" class="form-control">	
				</div>
			</div>
		</div>

		<div class="genres-holder">
			@foreach($genres as $genre)
				<label for="genre">{{$genre->name}}</label>
				@if($movie->genres->contains('name', $genre->name))
					<input type="checkbox" name="genre[]" value="{{$genre->id}}" checked>
				@else
					<input type="checkbox" name="genre[]" value="{{$genre->id}}">
				@endif
			@endforeach
		</div>
		<div id="casts-holder">
			@foreach($movie->cast as $celeb)
				<input type="text" name="cast[]" value="{{$celeb->name}}">
			@endforeach
			<button class="btn movie-db-btn" type="button" onclick="addCast()">Add Cast</button>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>

	<form class="single-delete" method="POST" action="{{route('movies.destroy', $movie->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
@endsection

@section('scripts')
<script src="{{asset('js/add-button.js')}}"></script>
@endsection