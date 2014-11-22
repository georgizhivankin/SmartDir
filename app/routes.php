<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Home page controller
 * 
 * Routes to the homepage of the application
 */
Route::get('/', 'IndexController@showIndex');

/**
 * Static Pages Controller
 * 
 * Show static pages by defining multiple routes for all of them in a single controller
*/
Route::get('about', 'StaticController@showAbout');
Route::get('contact', 'StaticController@showContact');
Route::get('contacts', 'StaticController@showContact');

/**
 * Register controller
 * 
 * Allows users to register to the application
 */
Route::get('users/register', array('uses' => 'UserController@create', 'as' => 'UserController.create'
));
Route::post('users/register', array('before' => 'csrf', 'uses' => 'UserController@store',
'as' => 'UserController.store'));

/**
 * Show user list
 */
Route::get('users/list', array('uses' => 'UserController@index', 'as' => 'UserController.index'));

/**
 * Allows directories to be added to the database
 */
Route::get('directories/add', array('uses' => 'DirectoryController@create', 'as' => 'DirectoryController.create'
));
Route::post('directories/add', array('before' => 'csrf', 'uses' => 'DirectoryController@store',
'as' => 'DirectoryController.store'));

/**
 * Show directory and file list
 */
Route::get('directories/list', array('uses' => 'DirectoryController@index', 'as' => 'DirectoryController.index'));

/**
 * Show individual file
 */
Route::get('directories/show/{id}', array('uses' => 'DirectoryController@show', 'as' => 'DirectoryController.show'));

/**
 * Login controller
 *
 * Allows users to log into the application
 */
Route::get('login', [
'uses' => 'LoginController@showLogin',
'as' => 'login.index'
]);
Route::post('login', ['before' => 'csrf', 'uses' => 'LoginController@login',
'as' => 'login.login'
]);

/**
 * Log out controller
 *
 * Allows users to log out of the application
 */
Route::get('logout', [
'uses' => 'LogoutController@logout',
'as' => 'logout.logout'
]);
