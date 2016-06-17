@extends('layouts.master')
@section('content')
<div class="col-lg-11 col-lg-offset-1 col-md-12 col-md-offset-1 col-sm-12 col-sm-offset-1 col-xs-12 col-xs-offset-1">
	<h3>Events you're hosting</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th class="hidden-sm hidden-xs">Location</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($hostingevents as $event)
				<tr>
					<th><a href="{{{action('EventsController@show', $event->id)}}}">{{{$event->title}}}</a></th>
					<td class="hidden-sm hidden-xs">{{{$event->location}}}</td>
					<td><button class="btn btn-success"><a href="{{{action('EventsController@showdrink', $event->id)}}}">Add Drinks</a></button></td>
					<td><button class="btn btn-secondary"><a href="{{{action('EventsController@showinvite', $event->id)}}}">Invite Guests</a></button></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{{action('EventsController@showsetup')}}}">Set up an Event!</a>
	<h3>Events you have been invited to</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Location</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach($attendingevents as $event)
				<tr>
					<th><a href="{{{action('EventsController@show', $event->id)}}}">{{{$event->title}}}</th>
					<th>{{{$event->location}}}</th>
					<th>{{{$event->description}}}</th>
				</tr>
			@endforeach
		</tbody>
	</table>

</div>
@stop