@extends('layouts.master')
@section('content')
	<h3 class="text-center">{{{$event->title}}}</h3>
	<h4 class="text-center">{{{$event->description}}}</h4>
	<h4 class="text-center">Hosted by: {{{User::find($event->host_id)->fullname}}}</h4>
	<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
		<h4>People Invited:</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th># of drinks</th>
					<th>BAC</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($guests as $guest)
					<tr>
						<td>{{{User::find($guest->user_id)->fullname}}}</td>
						<td>{{{$guest->number_of_drinks}}}</td>
						<td>{{{$guest->bac}}}</td>
						<td>{{{$guest->status}}}</td>
						@if($guest->status == "Sober")
							<td><a href="{{{action('EventsController@showserve', array($event->id, $guest->user_id))}}}"><button class="btn btn-success">Serve Drink</button></a></td>
						@elseif($guest->status == "Ok")
							<td><a href="{{{action('EventsController@showserve', array($event->id, $guest->user_id))}}}"><button class="btn btn-slight">Serve Drink</button></a></td>
						@elseif($guest->status == "Intoxicated")
							<td><a href="{{{action('EventsController@showserve', array($event->id, $guest->user_id))}}}"><button class="btn btn-warning">Serve Drink</button></a></td>
						@elseif($guest->status == "Dangerously Intoxicated")
							<td><a href="{{{action('EventsController@showserve', array($event->id, $guest->user_id))}}}"><button class="btn btn-danger">Serve Drink</button></a></td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
		<h4>Drinks in Stock:</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Drink Name</th>
					<th>% Alcohol</th>
					<th>Amount Remaining</th>
				</tr>
			</thead>
			<tbody>
				@foreach($drinks as $drink)
					<tr>
						<td>{{{$drink->name}}}</td>
						<td>{{{$drink->percent_alcohol}}}</td>
						<td>{{{$drink->amount}}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop