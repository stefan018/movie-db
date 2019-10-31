@extends('layout')

@section('content')
<div class="single">
	<div class="row">
		<div class="col-md-4 single-image">
			<img src="{{$serie->cover}}">
		</div>
		<div class="col-md-8 single-body">
			<h3 class="title">{{$serie->title}}</h3>
			<div class="single-info">
				<span>{{$serie->duration}} min</span>
				
				@foreach($serie->genres as $genre)
					<span class="single-genre"><a href="{{route('genres.series', $genre->id)}}">{{$genre->name}}</a></span>
				@endforeach
				
			</div>
			<p>{{$serie->description}}</p>
			<div class="single-cast">
				Stars: 
				@foreach($serie->cast as $celeb)
					
					@if(!$loop->last)
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
					<span>,</span>
					@else
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
					@endif
				@endforeach
			</div>
			<div class="other-info">
				@if($serie->premiere > date('Y-m-d'))
					<p>Premiere: {{$serie->premiere}}</p>
				@endif
				<span>Seasons: {{$serie->seasons}}</span>
				<span>Episodes per season: {{$serie->episodes_per_season}}</span>

			</div>
			@if(Auth::check() && auth()->user()->isAdmin())
				<a class="btn movie-db-btn" href="{{route('series.edit', $serie->id)}}">Edit</a>
			@endif		
		</div>
	</div>
</div>
	
@endsection