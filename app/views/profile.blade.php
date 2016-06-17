@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<form class="form-horizontal" method="POST" action="{{{action('UsersController@update')}}}">
		<div class="form-group">
			<label for="fullname">Full Name</label>
			<input type="text" name="fullname" id="fullname" value="{{{$user->fullname}}}">
		</div>
		<div class="form-group">
			<label for="age">Age</label>
			<input type="text" name="age" id="age" value="{{{$user->age}}}">
		</div>
		<div class="form-group">
			<label for="gender">Gender</label>
			<input type="text" name="gender" id="gender" value="{{{$user->gender}}}">
		</div>
		<div class="form-group">
			<label for="weight">Weight</label>
			<input type="text" name="weight" id="weight" value="{{{$user->weight}}}">
		</div>
		<div class="form-group">
			<label for="height">Height</label>
			<input type="text" name="height" id="height" value="{{{$user->height}}}">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="{{{$user->email}}}">
		</div>
		<div class="form-group">
			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone" value="{{{$user->phone}}}">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Edit</button>
		</div>
	</form>
</div>
@stop