@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<h3>Drinks currently in stock: </h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>% Alcohol</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($drinks as $drink)
				<tr>
					<th>{{{$drink->name}}}</th>
					<th>{{{$drink->percent_alcohol}}}</th>
					<th>{{{$drink->amount}}}</th>
				</tr>
			@endforeach
		</tbody>
	</table>
	<form class="form-horizontal" method="POST" action="{{{action('EventsController@adddrink', $event->id)}}}">

		<div class="form-group">
			<input type="text" name="name" placeholder="Name of the Drink">
		</div>

		<div class="form-group">
			<input type="text" name="percent_alcohol" placeholder="% of Alcohol per Volume">
		</div>

		<div class="form-group">
			<input type="text" name="amount" placeholder="Amount Available">Bottles/Cans/Ounces
		</div>
		<div class="form-group">
			<input type="text" name="size" placeholder="Size of Serving (bottles, ounces, etc.)">Bottles/Cans/Ounces
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Add Drink</button>
		</div>
	</form>
</div>
@stop