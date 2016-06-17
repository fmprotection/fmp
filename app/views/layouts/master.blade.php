<!DOCTYPE html>
<html>
<head>
	<title>FMP</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/fmp.css">
	@yield('top-script')
</head>
<body>
	<div class="navbar text-center row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="{{{action('HomeController@landingpage')}}}"><div class="logo col-lg-1 col-md-1 col-sm-1 col-xs-1">
				FMP
			</div></a>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-2"></div>
				<a href="{{{action('HomeController@about')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">About</div></a>
				@if(Auth::check())
				<a href="{{{action('UsersController@profile')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">Profile</div></a>
				@else
				@endif
				@if(Auth::check())
				<a href="{{{action('EventsController@index')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">Events</div></a>
				@else
				<a href="{{{action('HomeController@showsignup')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">Signup</div></a>
				@endif
				@if(Auth::check())
				<a href="{{{action('HomeController@logout')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">Logout</div></a>
				@else
				<a href="{{{action('HomeController@showlogin')}}}"><div class="navlink col-lg-1 col-md-1 col-sm-1 col-xs-2">Login</div></a>
				@endif
			</div>
		</div>
	</div>
	@if (Session::has('successMessage'))
    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	@yield('content')

	<script src="/js/jquery.js"></script>
	@yield('bottom-script')
</body>
</html>