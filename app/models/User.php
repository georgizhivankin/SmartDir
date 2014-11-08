<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/** Define the SoftDeletingTrait attribute action
	 * 
	 */
	protected $dates = ['deleted_at'];
	
	/** Define a few relationships
	 * @return mixed
	 */
	public function directories() {
	    return $this->belongsToMany('DirectoryModel', 'users_directories', 'user_id', 'directory_id')->withTimestamps();
	}
	
}
