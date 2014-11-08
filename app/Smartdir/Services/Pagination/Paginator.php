<?php

namespace Smartdir\Services\Pagination;

use Illuminate\Pagination\Factory as IlluminatePaginator;

/**
 * Base Pagination class.
 * All entity specific pagination classes inherit
 * this class and can override any function for respective specific needs
 */
abstract class Paginator {
	
	/**
	 *
	 * @var Illuminate\Pagination\Factory
	 */
	protected $_paginator;
	public function __construct(IlluminatePaginator $paginator) {
		$this->_paginator = $paginator;
	}
	
	/**
	 * function Paginate
	 *
	 * @param int $items        	
	 * @param int $totalItems        	
	 * @param int $perPage        	
	 * @return boolean
	 */
	public function paginate($items, $totalItems, $perPage) {
		// Check if all of the variables are passed through, if not, assume default values
		if (!isset($items)) {
			$items = 10;
		}
		if (!isset($totalItems)) {
			$totalItems = '';
		}
		if (!isset($itemsPerPage)) {
			$itemsPerPage = 10;
		}
		// use Laravel's Paginator and paginate the data
		$paginator = $this->_paginator->make ( $items, $totalItems, $perPage );
		// all good and shiny
		return true;
	}
}