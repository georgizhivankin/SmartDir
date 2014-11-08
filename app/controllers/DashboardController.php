<?php

class DashboardController extends BaseController {
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	/**
	 * Show the dashboard index.
	 * 
	 * @return Response
	 */
			public function showIndex()
	{
		$this->layout->content = View::make('pages.dashboard');
	}

}
