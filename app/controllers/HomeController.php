<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function landingpage() {
		return View::make('landingpage');
	}

	public function about() {
		return View::make('about');
	}

	public function showsignup() {
		if(!Auth::check()) {
			return View::make('signup');
		}
	}

	public function dosignup() {
		if(!Auth::check()) {
			$user = new User();
			$user->fullname = Input::get('fullname');
			$user->age = Input::get('age');
			$user->gender = Input::get('gender');
			$user->weight = Input::get('weight');
			$user->height = Input::get('height');
			$user->email = Input::get('email');
			$user->phone = Input::get('phone');
			$user->password = Hash::make(Input::get('password'));
			if($user->save()) {
				Session::flash('successMessage', 'Welcome!');
				return Redirect::action('HomeController@landingpage');
			}
		}
	}

	public function showlogin() {
		if(!Auth::check()) {
			return View::make('login');
		}
	}

	public function dologin() {
		$userdata = [
			'email' => Input::get('email'),
			'password' => Input::get('password')
		];
		if(Auth::attempt($userdata)) {
			return Redirect::action('HomeController@landingpage');
		}
	}

	public function logout() {
		if(Auth::check()) {
			Auth::logout();
			Session::flash('successMessage', 'Goodbye');
			return Redirect::action('HomeController@landingpage');
		}
	}

}
