<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table) {
			$table->increments('id');
			$table->integer('host_id')->unsigned();
			$table->foreign('host_id')->references('id')->on('users');
			$table->string('start_date');
			$table->string('end_date');
			$table->string('start_time');
			$table->string('end_time');
			$table->string('location');
			$table->string('description');
			$table->string('title');
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
		Schema::drop('events');
	}

}
