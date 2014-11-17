<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialSchema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * 
		 * Initial schema for database
		 */
				// Schema for table directories
		Schema::create('directories', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('path', '255');
			$table->timestamps();
		});
		// Schema for users table
		Schema::create('users', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('username', '128')->unique();
			$table->string('email', '255')->unique();
			$table->binary('password');
			$table->rememberToken();
			$table->string('first_name', '255')->nullable();
			$table->string('last_name', '255')->nullable();
			$table->string('home_directory')->nullable();
			$table->boolean('is_admin');
			$table->timestamps();
			$table->softDeletes();
		});
		// Schema for pivot table users_directories
		Schema::create('users_directories', function(Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('directory_id')->unsigned();
			$table->foreign('directory_id')->references('id')->on('directories');
			$table->timestamps();
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/**
		 * 
		 * Drop all tables
		 * First drop the pivot table as otherwise migrate:reset would not be able to reset the migration due to MySQL foreign key constraint violations
		 * Then drop all other tables
		 */
		Schema::drop('users_directories');
		Schema::drop('directories');
		Schema::drop('users');
	}

}
