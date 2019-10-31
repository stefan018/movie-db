@extends('layout')

@section('content')
	<h3>Cast results</h3>
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