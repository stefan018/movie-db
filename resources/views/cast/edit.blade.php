@extends('layout')

@section('content')
	<form method="POST" action="{{route('cast.update', $celeb->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div>
			<label>Enter Name</label>
			<input type="text" name="name" value="{{old('name', $celeb->name)}}">
		</div>
		<div>
			<label>Male</label>
			<input type="radio" name="gender" value="m" {{$celeb->gender == 'm' ? 'checked' : ''}}>
			<label>Female</label>
			<input type="radio" name="gender" value="f" {{$celeb->gender == 'f' ? 'checked' : ''}}>
			<label>Other</label>
			<input type="radio" name="gender" value="o" {{$celeb->gender == 'o' ? 'checked' : ''}}>
		</div>
		<textarea name="biography">{{old('biography', $celeb->biography)}}</textarea>
		<div>
			<label>Birth Date</label>
			<input type="date" name="birth_date" value="{{old('birth_date', $celeb->birth_date)}}">
			<label>Place of birth</label>
			<input type="text" name="birth_place" value="{{old('birth_place', $celeb->birth_place)}}">
		</div>
		<label>Photo</label>
		<input type="file" name="photo">
		<button type="submit">Update</button>
	</form>

	<form method="POST" action="{{route('cast.destroy', $celeb->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit">Delete</button>
	</form>

@endsection