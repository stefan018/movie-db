@extends('layout')

@section('content')

<div class="genre-movies">
	<h2>{{$genre->name}} Movies</h2>
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

<div class="pagination">
	{{ $movies->links() }}
</div>


@endsection