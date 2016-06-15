@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<form class="form-horizontal" method="POST" action="{{{action('EventsController@dosetup')}}}">
		<div class="form-group">
			<input type="text" name="title" placeholder = "Title of Event">
		</div>
		<div class="form-group">
			<input type="text" name="start_date" placeholder="Start Date">
		</div>
		<div class="form-group">
			<input type="text" name="end_date" placeholder="End Date">
		</div>
		<div class="form-group">
			<input type="text" name="start_time" placeholder="Start Time">
		</div>
		<div class="form-group">
			<input type="text" name="end_time" placeholder="End Time">
		</div>
		<div class="form-group">
			<input type="text" name="location" placeholder="Location">
		</div>
		<div class="form-group">
			<input type="text" name="description" placeholder="Description">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
@stop