<?php
class EventsController extends BaseController {

	public function index() {
		if(Auth::check()) {
			$attendingevents = [];
			$hostingevents = DB::table('events')->where('host_id', Auth::id())->get();
			$attending = DB::table('guests')->where('user_id', Auth::id())->get();
			$allevents = Plan::all();
			foreach($attending as $event) {
				foreach($allevents as $plan) {
					if($event->event_id == $plan->id) {
						array_push($attendingevents, $plan);
					}
				}
			}
			return View::make('events.index')->with('hostingevents', $hostingevents)->with('attendingevents', $attendingevents);
		}
	}

	public function show($id) {
		if(Auth::check()) {
			$event = Plan::find($id);
			$drinks = DB::table('eventdrinks')->where('event_id', $id)->get();
			$guests = DB::table('guests')->where('event_id', $id)->get();
			return View::make('events.show')->with('event', $event)->with('drinks', $drinks)->with('guests', $guests);
		}
	}
	public function showsetup() {
		if(Auth::check()) {
			return View::make('events.create');
		}
	}

	public function dosetup() {
		if(Auth::check()) {
			$plan = new Plan();
			$plan->title = Input::get('title');
			$plan->host_id = Auth::id();
			$plan->start_date = Input::get('start_date');
			$plan->end_date = Input::get('end_date');
			$plan->start_time = Input::get('start_time');
			$plan->end_time = Input::get('end_time');
			$plan->location = Input::get('location');
			$plan->description = Input::get('description');
			$plan->save();
			Session::flash('successMessage', 'Alriiiight! Start inviting people and stocking the inventory!');
			return Redirect::action('EventsController@index');
		}
	}

	public function showinvite($id) {
		$event = Plan::find($id);
		$guests = DB::table('guests')->where('event_id', $id)->get();
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.invite')->with('event', $event)->with('guests', $guests);
		}
	}

	public function sendinvite($id) {
		$event = Plan::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$dbsearch = DB::table('users')->where('email', Input::get('email'))->pluck('id');

			$guestsearch = DB::table('guests')->where('event_id', $id)->where('user_id', $dbsearch)->get();

			if($dbsearch != null) {
				if($guestsearch == null) {
					$guest = new Guest();
					$guest->event_id = $id;
					$guest->user_id = $dbsearch;
					
					$guest->number_of_drinks = 0;
					$guest->bac = "0.0";
					$guest->status = "Sober";

					if($guest->save()) {
						Session::flash('successMessage', "Guest successfully invited");
						return Redirect::action('EventsController@showinvite', $id);
					} else {
						Session::flash('errorMessage', 'There was an error inviting this guest');
						return Redirect::back();
					}
				} else {
					Session::flash('errorMessage', 'You have already invited this guest');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'This user does not exist');
				return Redirect::back();
			}
		}
	}
	public function showdrink($id) {
		$event = Plan::find($id);
		$drinks = DB::table('eventdrinks')->where('event_id', $id)->get();
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.drinks')->with('event', $event)->with('drinks', $drinks);
		}
	}

	public function adddrink($id) {
		$event = Plan::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$drink = new Eventdrink();
			$drink->event_id = $id;
			$drink->name = Input::get('name');
			$drink->percent_alcohol = Input::get('percent_alcohol');
			$drink->amount = Input::get('amount');
			$drink->size_of_serving = Input::get('size')
;			
			if($drink->save()) {
				Session::flash('successMessage', 'Drink added to inventory');
				return Redirect::action('EventsController@showdrink', $event->id);
			}
		} else {
			Session::flash('errorMessage', 'You must be logged in and hosting this event to do this!');
			return Redirect::action('HomeController@showlogin');
		}
	}

	public function showserve($id, $userid) {
		$event = Plan::find($id);
		$guest = User::find($userid);
		$drinks = DB::table('eventdrinks')->where('event_id', $id)->get();
		if(Auth::check() && $event->host_id == Auth::id()) {
			return View::make('events.serve')->with('event', $event)->with('guest', $guest)->with('drinks', $drinks);
		}
	}

	public function doserve($id, $userid) {
		$event = Plan::find($id);
		if(Auth::check() && $event->host_id == Auth::id()) {
			$drink = new Drink();
			$drink->event_id = $id;
			$drink->guest_id = $userid;
			$drink->eventdrink_id = Input::get('drink');
			$drink->save();

			$eventdrink = Eventdrink::find(Input::get('drink'));
			$eventdrink->amount -= $eventdrink->size_of_serving;
			$eventdrink->save();

			$guestid = DB::table('guests')->where('event_id', $id)->where('user_id', $userid)->pluck('id');
			$guest = Guest::find($guestid);
			$guest->number_of_drinks += 1;
			$guest->bac = 22;
			if($guest->number_of_drinks > 1 && $guest->number_of_drinks < 3) {
				$guest->status = "Ok";
			} else if($guest->number_of_drinks >= 3 && $guest->number_of_drinks < 5) {
				$guest->status = "Intoxicated";
			} else if($guest->number_of_drinks >= 5) {
				$guest->status = "Dangerously Intoxicated";
			}
			if($guest->save()) {
				Session::flash('successMessage', "Drink served");
				return Redirect::action('EventsController@show', $event->id);
			} else {
				Session::flash('errorMessage', 'There was an error serving this drink');
				return Redirect::back();
			}
		}
	}
}
?>