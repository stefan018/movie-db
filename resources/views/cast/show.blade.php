@extends('layout')

@section('content')
<div class="single">
	<div class="row">
		<div class="col-md-3 single-image">
			<img src="{{$celeb->photo}}">
			<div class="single-bio">
				<p>Born: {{$celeb->birth_date}}</p>
				<p>In: {{$celeb->birth_place}}</p>
			</div>
		</div>
		<div class="col-md-9 single-body">
			<h3 class="title">{{$celeb->name}}</h3>
			
			<p>{{$celeb->biography}}</p>	
			<div class="single-screenplay">
				Movies: 
				@foreach($celeb->movies as $movie)
					<a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a>
					@if(!$loop->last)
						<span>,</span>
					@endif
				@endforeach
			</div>
			<div class="single-screenplay">
				Series:
				@foreach($celeb->series as $serie)
					<a href="{{route('series.show', $serie->id)}}">{{$serie->title}}</a>
					@if(!$loop->last)
					<span>,</span>
					@endif
				@endforeach
			</div>
			@if(Auth::check() && auth()->user()->isAdmin())
			<a class="btn movie-db-btn" href="{{route('cast.edit', $celeb->id)}}">Edit</a>
			@endif
		</div>
	</div>
</div>
@endsection