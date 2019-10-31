@extends('layout')

@section('content')
	
	@include('errors')
	
	<form method="POST" action="{{route('cast.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
			<input class="form-control" type="text" name="name" value="{{old('name')}}">
		</div>
		<div class="form-group">
			<label>Male</label>
			<input type="radio" name="gender" value="m">
			<label>Female</label>
			<input type="radio" name="gender" value="f">
			<label>Other</label>
			<input type="radio" name="gender" value="o">
		</div>
		<div class="form-group">
			<label for="biography">Biography:</label>
			<textarea class="form-control" name="biography">{{old('biography')}}</textarea>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="birth_date">Enter birth date:</label>
					<input class="form-control" type="date" name="birth_date" value="{{old('birth_date')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="birth_place">Enter birth place:</label>
					<input class="form-control" type="text" name="birth_place" value="{{old('birth_place')}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-gorup">
					<label for="photo">Photo:</label>
					<input class="form-control" type="file" name="photo">
				</div>
			</div>
		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>

@endsection