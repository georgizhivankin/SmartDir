<?php
class IndexController extends BaseController {
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	/**
	 * Show the index controller view.
	 *
	 * @return Response
	 */
	public function showIndex() {
		$this->layout->content = View::make ( 'pages.index' );
	}
	
}
