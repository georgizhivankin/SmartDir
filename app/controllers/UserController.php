<?php
use Smartdir\Exceptions\ValidationException;
use Smartdir\Services\Validation\UserRegistrationValidator;
use Smartdir\Services\Mail\Mail as Mail;

class UserController extends \BaseController
{
    
    // Define the main layout used to display that controller's view
    protected $layout = 'layouts.default';

    /**
     *
     * @var Smartdir\Services\Validation\UserRegistrationValidator
     */
    protected $_validator;
    
    /**
     *
     * @var Smartdir\Services\Mail
     */
    protected $mail;
    
    public function __construct(UserRegistrationValidator $validator, Mail $mail)
    {
        $this->_validator = $validator;
        $this->mail = $mail;
    }

    /**
     * Display the users listing.
     *
     * @return Response
     */
    public function index()
    {
        // Get all users from the database
        $users = User::all();
        // Prepare and display the list view by passing the $users data to the view
        $this->layout->content = View::make('pages.users.list')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the user registration form
        $this->layout->content = View::make('pages.users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // Get the details from the form and try to register a new user using the User model
        $user = new User();
        
        // Fetch email, username, password and is_admin details and assign them to the user object
        $user->email = Input::get('email');
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        // Get home directory for the user (if it's set)
        (Input::get('home_directory')) ? ($user->home_directory = Input::get('home_directory')):($user->home_directory = null);
        // Get whether the 'is_admin' variable is passed and if it is not, set it manually to 0 I.E. not admin, as otherwise, the SQL constraints would be invalidated and the app would crash with an sqlstate exception
        (Input::get('is_admin')) ? ($user->is_admin = Input::get('is_admin')) : ($user->is_admin = 0);
        
        // Validate details using our custom Validator service class
        $input = Input::all();
        
        // Try to save the user into the DB
        try {
            $validate_data = $this->_validator->validate($input);
            // Save user to DB after successful validation
            $user->save();
            
                        // Send a confirmation email to the user
                        $from = Config::get('appInfo.email');
                        $to = $user->email;
                        $message = 'test';
                        $view = 'emails.auth.registrationConfirmation';
                        $data = array('username' => $user->username);
            $this->mail->sendMail($from, $to, $cc = null, $message, $attachments = null, $view, $data);
            
            return Redirect::to('users/register')->withMessage('The user was registered successfully');
        } catch (ValidationException $e) {
            return Redirect::to('users/register')->withInput()->withErrors($e->get_errors());
        }
    
    /**
     * OLD LEGACY CODE START
     *
     * // Check if the username has been provided, is unique, does not already exist in the database and consists only of alphanumeric characters and that the email is provided, is unique, and conforms to the email address format
     * $validationRules = array (
     * 'username' => array (
     * 'required',
     * 'alpha_num',
     * 'unique:users',
     * 'min:3',
     * 'max:50'
     * ),
     * 'email' => array (
     * 'required',
     * 'unique:users',
     * 'email',
     * 'max:255'
     * ),
     * 'password' => array (
     * 'required',
     * 'alpha-num',
     * 'min:3'
     * )
     * );
     * // Validate the fields against the rules
     * $validator = Validator::make ( Input::all (), $validationRules );
     *
     * if ($validator->fails ()) {
     * $data = Input::all ();
     * Session::flash ( 'error', 'The user was not registered successfully' . var_dump ( $data ) );
     * Input::flash ();
     * $errors = $validator->messages ();
     * // Add the errors to our form
     * return Redirect::to ( 'users/register' )->withErrors ( $validator );
     * }
     * // Save the user to the DB
     * if ($validator->passes ()) {
     * $user->save ();
     * }
     * // Check if the user has been successfully saved
     * $insertedId = $user->id;
     * if ($insertedId) {
     * Session::flash ( 'message', 'The user was registered successfully' );
     * return Redirect::to ( 'users/register' );
     * }
     * OLD LEGACY CODE END
     */
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
        // Show a single user
        $this->layout->content = View::make('pages/users.single/{{$id}}');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id            
     * @return Response
     */
    public function update($id)
    {
        //
    }
	
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
	
}
