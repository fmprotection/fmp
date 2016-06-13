<?php
class EventsController extends BaseController {

	public function index() {
		if(Auth::check()) {
			$hostingevents = DB::table('events')->where('host_id', Auth::id())->get();
			$attendingevents = DB::table('guests')->where('user_id', Auth::id())->get();
			return View::make('events.index')->with('hostingevents', $hostingevents)->with('attendingevents', $attendingevents);
		}
	}
	public function showsetup() {
		if(Auth::check()) {
			return View::make('events.create');
		}
	}

	public function dosetup() {
		if(Auth::check()) {
			$event = new Event();
			$event->host_id = Auth::id();
			$event->start_date = Input::get('start_date');
			$event->end_date = Input::get('end_date');
			$event->start_time = Input::get('start_time');
			$event->end_time = Input::get('end_time');
			$event->locaion = Input::get('location');
			$event->description = Input::get('description');
			$event->save();
		}
	}

	public function showinvite($id) {
		$event = Event::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.invite');
		}
	}

	public function sendinvite($id) {
		$event = Event::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$guest = new Guest();
			$guest->event_id = $id;
			$guest->user_id = DB::table('users')->where('email', Input::get('email'))->pluck('id');
			$guest->number_of_drinks = 0;
			$guest->bac = "0.0";
			$guest->status = "Sober";
			$guest->save();
		}
	}
	public function showdrink($id) {
		$event = Event::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.drinks');
		}
	}

	public function adddrink($id) {
		$event = Event::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$drink = new Eventdrink();
			$drink->event_id = $id;
			$drink->name = Input::get('name');
			$drink->percent_alcohol = Input::get('percent_alcohol');
			$drink->amount = Input::get('amount');
			$drink->save();
		}
	}

	public function showserve($id) {
		$event = Event::find($id);
		$guests = DB::table('guests')->where('event_id', $id)->get();
		$drinks = DB::table('eventdrinks')->where('event_id', $id)->get();
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.serve')->with('guests', $guests)->with('drinks', $drinks);
		}
	}

	public function doserve($id) {
		$event = Event::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$drink = new Drink();
			$drink->event_id = $id;
			$drink->guest_id = Input::get('guest');
			$drink->eventdrink_id = Input::get('drink');
			$drink->save();

			$guestid = DB::table('guests')->where('event_id', $id)->where('user_id', Input::get('guest'))->pluck('id');
			$guest = Guest::find($guestid);
			$guest->number_of_drinks += 1;
			$guest->bac = 22;
			$guest->status = "Ok";
			$guest->save();
		}
	}
}
?>