<?php
class UsersController extends BaseController {
	public function profile($id) {
		if(Auth::check()) {
			$user = User::find($id);
			return View::make('profile')->with('user', $user);
		}
	}
}
?>