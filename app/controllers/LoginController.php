<?php
class LoginController extends BaseController {
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	/**
	 * Show the user index.
	 */
	public function showLogin() {
		$this->layout->content = View::make ( 'pages.authentication.login' );
	}
	
	public function login() {
		if (Auth::attempt ( array (
				'email' => Input::get('email'),
				'password' => Input::get('password') 
		) )) {
			return Redirect::intended ( '/' )->with('message', 'You successfully logged in.');
		} else {
			return Redirect::to('login')->with('error', 'The email address or password you have typed is incorrect. Please try again.')->withInput();
		}
	}
	
}