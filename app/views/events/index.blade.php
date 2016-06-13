@extends('layouts.master')
@section('content')
<div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 col-sm-12 col-sm-offset-1 col-xs-12 col-xs-offset-1">
	<h3>Events you're hosting</h3>
	@foreach($hostingevents as $event)
	<div class="text-center">{{{$event->id}}}</div>
	@endforeach
	<a href="{{{action('EventsController@showsetup')}}}">Set up an Event!</a>
	<h3>Events you have been invited to</h3>
	@foreach($attendingevents as $event)
	<div class="text-center">{{{$event->event_id}}}</div>
	@endforeach

</div>
@stop