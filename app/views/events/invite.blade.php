@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<h3>People who have been invited to this event</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Guest</th>
			</tr>
		</thead>
		<tbody>
			@foreach($guests as $guest)
				<tr>
					<td>{{{User::find($guest->user_id)->fullname}}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<form class="form-horizontal" method="POST" action="{{{action('EventsController@sendinvite', $event->id)}}}">
		<div class="form-group">
			<input type="text" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<button class="btn btn-success">Invite</button>
		</div>
	</form>
</div>
@stop