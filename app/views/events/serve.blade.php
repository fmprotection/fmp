@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
	<h3>Serving {{{$guest->fullname}}}</h3>
	<form class="form-horizontal" method="POST" action="/plan/{{{$event->id}}}/serve/{{{$guest->id}}}">
		<div class="form-group">
			<label for="drink">What type of drink?</label>
			<select name="drink">
				@foreach($drinks as $drink)
					<option value="{{{$drink->id}}}">{{{$drink->name}}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Serve</button>
		</div>
	</form>
</div>
@stop