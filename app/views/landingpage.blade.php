@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		<h1 class="landingmotto">Party Safe,<br>Party Hard</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-5 col-xs-offset-2">
		<span class="landingtext">Here at FMP, we are committed to making your party experience safe without looming over your shoulder</span>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-5 col-xs-offset-2">
		<a href="{{{action('HomeController@about')}}}"><button class="btn btn-about">
			Learn More</button></a>
	</div>
</div>
@stop