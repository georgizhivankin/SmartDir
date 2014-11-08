<?php
class StaticController extends BaseController {
	
	/**
	 * This controller defines all routes that are supposed to point to static pages.
	 */
	
	// Define the main layout used to display that controller's view
	protected $layout = 'layouts.default';
	
	/**
	 * Show the about page.
	 *
	 * @return View
	 */
	public function showAbout() {
		$this->layout->content = View::make ( 'pages.static.about' );
	}
	
	/**
	 * Show the contact page.
	 *
	 * @return View
	 */
	public function showContact() {
		$this->layout->content = View::make ( 'pages.static.contact' );
	}
	
}
