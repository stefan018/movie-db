@extends('layout')

@section('content')
<div class="single">
	<div class="row">
		<div class="col-md-4 single-image">
			<img src="{{$movie->cover}}">
		</div>
		<div class="col-md-8 single-body">
			<h3 class="title">{{$movie->title}}</h3>
			<div class="single-info">
				<span>{{$movie->duration}} min</span>
				
				@foreach($movie->genres as $genre)
					<span class="single-genre"><a href="{{route('genres.movies', $genre->id)}}">{{$genre->name}}</a></span>
				@endforeach
				
			</div>
			<p>{{$movie->description}}</p>
			<div class="other-info">
				<p>Release date: {{$movie->release_date}}</p>
			</div>	
			<div class="single-cast">
				Stars: 
				@foreach($movie->cast as $celeb)
					
					@if(!$loop->last)
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
					<span>,</span>
					@else
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
					@endif
				@endforeach
			</div>
			@if(Auth::check() && auth()->user()->isAdmin())
			<a class="btn movie-db-btn" href="{{route('movies.edit', $movie->id)}}">Edit</a>
			@endif
		</div>
	</div>
</div>
	

@endsection