@extends('layouts.master')
@section('content')
<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
	<form class="form-horizontal" method="POST" action="{{{action('HomeController@dosignup')}}}">
		<div class="form-group">
			<input type="text" name="fullname" id="fullname" placeholder="Full Name">
		</div>
		<div class="form-group">
			<input type="text" name="age" id="age" placeholder="Age">
		</div>
		<div class="form-group">
			<input type="text" name="gender" id="gender" placeholder="Gender">
		</div>
		<div class="form-group">
			<input type="text" name="weight" id="weight" placeholder="Weight">
		</div>
		<div class="form-group">
			<input type="text" name="height" id="height" placeholder="Height">
		</div>
		<div class="form-group">
			<input type="text" name="email" id="email" placeholder="Email">
		</div>
		<div class="form-group">
			<input type="text" name="phone" id="phone" placeholder="Phone">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" placeholder="Password">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Sign Up!</button>
		</div>
	</form>
</div>
@stop