@extends('layout')
@section('content')

<table>
	<thead>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Role</th>
		<th>Joined</th>
	</thead>
	<tbody>
		
	@foreach($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->role}}</td>
		<td>{{$user->created_at}}</td>
	</tr>
	@endforeach

	</tbody>
</table>

@endsection
