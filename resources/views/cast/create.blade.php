@extends('layout')

@section('content')

	<form method="POST" action="{{route('cast.store')}}" enctype="multipart/form-data">
		@csrf
		<div>
			<input type="text" name="name" placeholder="Enter name">
		</div>
		<div>
			<label>Male</label>
			<input type="radio" name="gender" value="m">
			<label>Female</label>
			<input type="radio" name="gender" value="f">
			<label>Other</label>
			<input type="radio" name="gender" value="o">
		</div>
		<label>Biography</label>
		<textarea name="biography"></textarea>
		<div>	
			<label>Enter birth date</label>
			<input type="date" name="birth_date">
			<label>Enter birth place</label>
			<input type="text" name="birth_place">
		</div>
		<label>Photo</label>
		<input type="file" name="photo">
		<button type="submit">Submit</button>
	</form>

@endsection