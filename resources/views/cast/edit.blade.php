@extends('layout')

@section('content')
	<form method="POST" action="{{route('cast.update', $celeb->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="form-group">
			<label for="name">Enter Name</label>
			<input class="form-control"type="text" name="name" value="{{old('name', $celeb->name)}}">
		</div>
		<div class="form-group">
			<label>Male</label>
			<input type="radio" name="gender" value="m" {{$celeb->gender == 'm' ? 'checked' : ''}}>
			<label>Female</label>
			<input type="radio" name="gender" value="f" {{$celeb->gender == 'f' ? 'checked' : ''}}>
			<label>Other</label>
			<input type="radio" name="gender" value="o" {{$celeb->gender == 'o' ? 'checked' : ''}}>
		</div>
		<div class="form-group">
			<label for="biography">Biography:</label>
			<textarea class="form-control" name="biography">{{old('biography', $celeb->biography)}}</textarea>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="birth_date">Birth Date:</label>
					<input class="form-control" type="date" name="birth_date" value="{{old('birth_date', $celeb->birth_date)}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="birth_place">Place of birth:</label>
					<input class="form-control" type="text" name="birth_place" value="{{old('birth_place', $celeb->birth_place)}}">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="photo">Photo:</label>
					<input class="form-control" type="file" name="photo">
				</div>
			</div>
		</div>
		
		<button class="btn btn-primary" type="submit">Update</button>
	</form>

	<form class="single-delete" method="POST" action="{{route('cast.destroy', $celeb->id)}}">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger" type="submit">Delete</button>
	</form>

@endsection