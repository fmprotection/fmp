<?php
class UsersController extends BaseController {
	public function profile() {
		if(Auth::check()) {
			$user = Auth::user();
			return View::make('profile')->with('user', $user);
		}
	}

	public function update() {
		if(Auth::check()) {
			$user = User::find(Auth::id());
			$user->fullname = Input::get('fullname');
			$user->age = Input::get('age');
			$user->weight = Input::get('weight');
			$user->height = Input::get('height');
			if(Input::get('email') != $user->email) {
				if(Input::get('email') != null) {
					$user->email = Input::get('email');
				} else {
					Session::flash('errorMessage', "All fields must be filled out!");
					return Redirect::back()->withInput();
				}
			} 
			$user->phone = Input::get('phone');
			if($user->save()) {
				Session::flash('successMessage', "Your information has been updated");
				return Redirect::action('UsersController@profile');
			} else {
				Session::flash('errorMessage', 'There was a problem saving your information');
				return Redirect::back()->withInput();
			}
		} else {
			Session::flash('errorMessage', 'You must be logged in to do this!');
			return Redirect::action('HomeController@showlogin');
		}
	}
}
?>