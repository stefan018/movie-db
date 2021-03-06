@extends('layout')

@section('content')

<div class="series">
	<div class="title-holder">
	<h2>Series</h2>
	@if(Auth::check() && auth()->user()->isAdmin())
		<a class="create-btn btn movie-db-btn" href="{{route('series.create')}}">Add a serie</a>
	@endif
	</div>
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

<div class="pagination">
	{{ $series->links() }}
</div>


@endsection