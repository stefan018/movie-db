@extends('layout')

@section('content')
	<h3 class="text-center">Add Serie</h3>
	@include('errors')
	<form method="POST" action="{{route('series.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Title:</label>
			<input class="form-control" type="text" name="title" value="{{old('title')}}">
		</div>
		<div class="form-group">
			<label for="description">Description:</label>
			<textarea class="form-control" name="description">{{old('description')}}</textarea>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="duration">Duration:</label>
					<input class="form-control" type="number" name="duration" value="{{old('duration')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="release_date">Release date:</label>
					<input class="form-control" type="date" name="release_date" value="{{old('release_date')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="premiere">Premiere:</label>
					<input class="form-control" type="date" name="premiere" value="{{old('premiere', null)}}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="seasons">Seasons:</label>
					<input class="form-control" type="number" name="seasons" value="{{old('seasons')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="episodes_per_season">Episodes per season:</label>
					<input class="form-control" type="number" name="episodes_per_season" value="{{old('episodes_per_season')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="cover">Cover:</label>
					<input class="form-control" type="file" name="cover">
				</div>
			</div>
		</div>

		<div class="genre-holder">
			@foreach($genres as $genre)
				<label for="genre">{{$genre->name}}</label>
				<input type="checkbox" name="genre[]" value="{{$genre->id}}">
			@endforeach
		</div>
		<div id="casts-holder">
			<button class="btn movie-db-btn" type="button" onclick="addCast()">Add Cast</button>
		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>

@endsection

@section('scripts')
<script src="{{asset('js/add-button.js')}}"></script>
@endsection