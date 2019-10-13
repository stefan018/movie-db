@extends('layout')

@section('content')

	@include('errors')
	<h3 class="text-center">Add Movie</h3>
	<form method="POST" action="{{route('movies.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="{{old('title')}}">
		</div>
		<div class="form-group">
			<label for="description">Description:</label>
			<textarea name="description" class="form-control">@if(old('description')){{old('description')}}@endif</textarea>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="duration">Duration:</label>
					<input type="number" name="duration" class="form-control" value="{{old('duration')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="release_date">Release date:</label>
					<input type="date" name="release_date" class="form-control" value="{{old('release_date')}}">
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
				<input type="checkbox" name="genre[]" value="{{$genre->id}}">
			@endforeach
		</div>
		<div id="casts-holder">
			<button type="button" onclick="addCast()">Add Cast</button>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection

@section('scripts')
<script src="{{asset('js/add-button.js')}}"></script>
@endsection