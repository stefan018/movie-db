@extends('layout')

@section('content')
	<div class="title-holder">
		<h3>Cast</h3>
		@if(Auth::check() && auth()->user()->isAdmin())
			<a class="create-btn btn movie-db-btn" href="{{route('cast.create')}}">Add a celebrity</a>
		@endif
	</div>
	@foreach($cast as $celeb)
		<div class="row cast-list">
			<div class="col-md-3">
				<div class="cover-holder">
					<img src="{{$celeb->photo}}">
				</div>
			</div>
			<div class="col-md-9">
				<h4><a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a></h4>
				<p>{{Str::limit($celeb->biography, 250, '...')}}</p>
				<div class="info">
					<span>Born: {{$celeb->birth_date}} in {{$celeb->birth_place}}</span>
				</div>
				<p><a href="{{route('cast.show', $celeb->id)}}">View Celebrity</a></p>

			</div>
		</div>
	@endforeach
@endsection