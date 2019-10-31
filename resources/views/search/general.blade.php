@extends('layout')

@section('content')
<div class="search-movies">	
	<h2>Movies matching your search</h2>
	@foreach($movies as $movie)
	<div class="row">
		<div class="col-md-3">	
			<div class="cover-holder">
				<img src="{{$movie->cover}}">
			</div>
		</div>
		<div class="col-md-9">
			<p class="title"><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></p>
			<div class="info-holder">
				<span>{{$movie->duration}} min</span>
				
				<div class="genre"> 
					@foreach($movie->genres as $genre)
						<span>
							<a href="{{route('genres.movies', $genre->id)}}">{{$genre->name}}</a>
						</span>
					@endforeach
				</div>
			</div>
			<div class="description">
				{{$movie->description}}
			</div>
			<div class="cast">
				<span>Cast: </span>
				@foreach($movie->cast as $celeb)
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
				@endforeach
			</div>
		</div>
	</div>
	@endforeach
</div>
<div class="search-series">
	<h2>Series mathcing your search</h2>
	@foreach($series as $serie)
	<div class="row">
		<div class="col-md-3">	
			<div class="cover-holder">
				<img src="{{$serie->cover}}">
			</div>
		</div>
		<div class="col-md-9">
			<p class="title"><a href="{{route('series.show', $serie->id)}}">{{$serie->title}}</a></p>
			<div class="info-holder">
				<span>{{$serie->duration}} min</span>
				
				<div class="genre"> 
					@foreach($serie->genres as $genre)
						<span>
							<a href="{{route('genres.series', $genre->id)}}">{{$genre->name}}</a>
						</span>
					@endforeach
				</div>
			</div>
			<div class="description">
				{{$serie->description}}
			</div>
			<div class="cast">
				<span>Cast: </span>
				@foreach($serie->cast as $celeb)
					<a href="{{route('cast.show', $celeb->id)}}">{{$celeb->name}}</a>
				@endforeach
			</div>
		</div>
	</div>
	@endforeach
</div>
<div class="search-cast">
	<h2>Cast mathcing your search</h2>
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
</div>
@endsection