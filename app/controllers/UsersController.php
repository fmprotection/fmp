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
		}
	}
}
?>