@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<form class="form-horizontal" method="POST" action="{{{action('UsersController@update')}}}">
		<div class="form-group">
			<input type="text" name="fullname" id="fullname" value="$user->fullname">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
		<div class="form-group">
			<input type="text" name="" id="" value="">
		</div>
	</form>
</div>
@stop