<?php
class RegisterController extends BaseController {
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	/**
	 * Display the form for creating a new user
	 *
	 * @return s View
	 */
	public function index() {
		$this->layout->content = View::make ( 'pages.register' );
	}
	public function create() {
		// Get the details from the form and try to register a new user using the User model
		$user = new User ();
		
		// Fetch email, username, password and is_admin details and assign them to the user object
		$user->email = Input::get ( 'email' );
		$user->username = Input::get ( 'username' );
		$user->password = Hash::make ( Input::get ( 'password' ) );
		$user->is_admin = Input::get ( 'is_admin' );
		// Validate details
		// Check if the username has been provided, is unique, does not already exist in the database and consists only of alphanumeric characters and that the email is provided, is unique, and conforms to the email address format
		$validationRules = array (
				'username' => array (
						'required',
						'alpha_num',
						'unique:users',
						'min:3',
						'max:50' 
				),
				'email' => array (
						'required',
						'unique:users',
						'email',
						'max:255' 
				),
				'password' => array (
						'required',
						'alpha-num',
						'min:3' 
				) 
		);
		// Validate the fields against the rules
		$validator = Validator::make ( Input::all (), $validationRules );
		
		if ($validator->fails ()) {
			$data = Input::all ();
			Session::flash ( 'error', 'The user was not registered successfully' . var_dump ( $data ) );
			Input::flash ();
			$errors = $validator->messages ();
			// Add the errors to our form
			return Redirect::to ( 'register' )->withErrors ( $validator );
		}
		// Save the user to the DB
		if ($validator->passes ()) {
			$user->save ();
		}
		// Check if the user has been successfully saved
		$insertedId = $user->id;
		if ($insertedId) {
			Session::flash ( 'message', 'The user was registered successfully' );
			return Redirect::to ( 'register' );
		}
	}
	
}
