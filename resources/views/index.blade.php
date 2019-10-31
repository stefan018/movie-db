@extends('layout')

@section('content')
	<!-- Row for slider-->
<div class="row">
	<div class="col-sm-12 carousel-section">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img class="d-block w-100" src="{{url('/images/website/award-slide.jpg')}}">
      				<div class="carousel-caption d-none d-md-block">
    					<h5>Movie DB - Best online database for cinema</h5>
 					 </div>
    			</div>
    			
    			<div class="carousel-item">
      				<img class="d-block w-100" src="{{url('/images/website/top-rated.jpg')}}">
      				<div class="carousel-caption d-none d-md-block">
    					<h5>Find top rated movies and tv-shows</h5>
 					 </div>
    			</div>
    			
  			</div>
  			
  			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
  			</a>
  			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  			</a>
		</div>
	</div>
</div>
<!-- Closing row for slider -->
<div class="upcoming-section">
 <h3>Upcoming Movies:</h3>
<div class="row">
  @foreach($movies as $movie)
  <div class="col">
    <p class="title"><a href="{{route('movies.show', $movie->id)}}">{{$movie->title}}</a></p>
    <div class="cover-holder">
      <img src="{{$movie->cover}}">
    </div>
    
    <div class="info-holder">
      <div class="genre">
        @foreach($movie->genres as $genre)
          <span><a href="{{route('genres.movies', $genre->id)}}">{{$genre->name}}</a></span>
        @endforeach
      </div>
      <span class="release-date">Release Date:{{$movie->release_date}}</span>
      
    </div>
    <p>{{Str::limit($movie->description, 150, '...')}}</p>
  </div>
  @endforeach
</div>

<h2>Upcoming Series</h2>
<div class="row">
  @foreach($series as $serie)
    <div class="col">
      <p class="title"><a href="{{route('series.show', $serie->id)}}">{{$serie->title}}</a></p>
      <div class="cover-holder">
         <img src="{{$serie->cover}}">
      </div>

      <div class="info-holder">
        <div class="genre">
           @foreach($serie->genres as $genre)
            <span><a href="{{route('genres.series', $genre->id)}}">{{$genre->name}}</a></span>
          @endforeach
        </div>
      </div>
      <p>{{Str::limit($serie->description, 150, '...')}}</p>
    </div>
  @endforeach
</div>
</div>


@endsection