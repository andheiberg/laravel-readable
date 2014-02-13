<?php

use Illuminate\Database\Migrations\Migration;

class CreateReadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reads', function($table) 
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('readable_id')->unsigned();
			$table->string('readable_type');
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
		Schema::drop('reads');
	}

}