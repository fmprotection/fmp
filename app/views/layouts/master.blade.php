<!DOCTYPE html>
<html>
<head>
	<title>FMP</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	@yield('top-script')
</head>
<body>
	<div class="navbar text-center row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href="{{{action('HomeController@landingpage')}}}">Home</a>
			</div>
			<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
				@if(Auth::check())
				<a href="{{{action('UsersController@profile', Auth::id())}}}">Profile</a>
				@else
				<a href="{{{action('HomeController@showlogin')}}}">Log In</a>
				@endif
			</div>
			<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
				@if(Auth::check())
				<a href="{{{action('EventsController@index')}}}">Events</a>
				@else
				<a href="{{{action('HomeController@showsignup')}}}">Signup</a>
				@endif
			</div>
			<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href="{{{action('HomeController@about')}}}">About</a>
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