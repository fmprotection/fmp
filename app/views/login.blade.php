@extends('layouts.master')
@section('content')
<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
	<form class="form-horizontal" method="POST" action="{{{action('HomeController@dologin')}}}">
		<div class="form-group">
			<input type="text" name="email" id="email" placeholder="email">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" placeholder="password">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
@stop