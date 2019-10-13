<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container content-holder">
<nav class="navbar navbar-expand-md">
	<div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
        </button>

       	<div class="collapse navbar-collapse" id="navbarSupportedContent">
       	    <!-- Left Side Of Navbar -->
       	    <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
       			<li class="nav-item"><a class="nav-link" href="{{route('movies.index')}}">Movies</a></li>
       			<li class="nav-item"><a class="nav-link" href="{{route('series.index')}}">Series</a></li>
       			<li class="nav-item"><a class="nav-link" href="{{route('cast.index')}}">Cast</a></li>
       	    </ul>
            <!-- Navbar center position-->
            <div class="navbar-center"> 
                <form class="form-inline" method="GET" action="{{route('search')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="search" placeholder="Search for movies, series or celebreties">
                        <select name="scope" class="custom-select">
                            <option value="all"selected>All</option>
                            <option value="movies">Movies</option>
                            <option value="series">Series</option>
                            <option value="cast">Cast</option>
                        </select>
                        <button class="btn btn-head-search" type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        	<a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
					        	{{ __('Logout') }}
                        	</a>

                       		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            	@csrf
                        	</form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<main>
            @yield('content')
</main>
</div>
 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>