<?php
class LogoutController extends BaseController {
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	public function logout() {
		// Check if user is logged in
		if (Auth::check ()) {
			// Log out the user and display the corresponding message
			Auth::logout ();
			$this->layout->content = View::make ( 'pages.authentication.logout' )->withMessage ( 'You have successfully logged out of the system.' );
		}
	}
	
}