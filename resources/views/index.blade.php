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
@endsection