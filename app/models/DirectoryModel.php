<?php

class DirectoryModel extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directories';

    /**
     * Define a few relationships within the model
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany('User', 'users_directories', 'directory_id', 'user_id')->withTimestamps();
    }
}