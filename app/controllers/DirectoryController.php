<?php
use Smartdir\Services\Filesystem\Filesystem as Filesystem;
use Smartdir\Exceptions\ValidationException;
use Smartdir\Services\Validation\DirectoryValidator;

class DirectoryController extends \BaseController
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
     * @var Filesystem
     */
    protected $filesystem;

    /**
     *
     * @param Filesystem $filesystem
     * @param DirectoryValidator $validator
     */
    public function __construct(Filesystem $filesystem, DirectoryValidator $validator)
    {
        $this->filesystem = $filesystem;
        $this->_validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Get all files in a directory and all subdirectories and prepare the contents for displaying it in a view
        $allFiles = $this->filesystem->listAllFiles('C:/xampp/htdocs/smartdir');
        $allSubdirectories = $this->filesystem->listSubdirectories('C:/xampp/htdocs/smartdir');
        // Prepare and display the list view by passing the $files data to the view
        $this->layout->content = View::make('pages.directories.list')->with(array('allFiles' => $allFiles, 'allSubdirectories' => $allSubdirectories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Show the directory add form
        // Get path
        if (Input::has('path')) {
            $path = input::get('path');
        } else {
            $path = null;
        }
        // Get all users from the user model
        $users = User::all();
        // Prepare an array of users for the select dropdown
        foreach ($users as $user) {
            $users_array[$user->id] = $user->username;
        }
                $this->layout->content = View::make('pages.directories.add')->with('path', $path)->with('users_array', $users_array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // Get the details from the form and try to add a new directory using the Directory model
        $directory = new DirectoryModel();
        
        // Fetch name, path and home_directory values
        $directory->name = Input::get('name');
        $directory->path = Input::get('path');
        // Get assigned to user
        $user = Input::get('assigned_to_user');
        // Get whether the 'home_directory' variable is passed and if it is not, set it manualy to 0 I.E. not a home directory
        (Input::get('home_directory')) ? ($directory->home_directory = Input::get('home_directory')) : ($directory->home_directory = 0);
        
        // Validate details using our custom Validator service class
        $input = Input::all();
        
        // Try to save the directory into the DB
        try {
            $validate_data = $this->_validator->validate($input);
            // Save directory to DB after successful validation
            $directory->save();
            // Assign user to the saved directory
            $directory->users()->attach($user);
        
            return Redirect::to('directories/add')->withMessage('The directory was saved successfully');
        } catch (ValidationException $e) {
            return Redirect::to('directories/add')->withInput()->withErrors($e->get_errors());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
