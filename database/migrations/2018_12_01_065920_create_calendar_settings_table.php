<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_settings', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('business_id')->unsigned();
			$table->timestamps();
			$table->integer('week_start')->unsigned()->nullable();
			$table->integer('increment_hour')->unsigned()->nullable();
			$table->integer('increment_minute')->unsigned()->nullable();
			$table->string('weekly_off', 64)->nullable();
			$table->string('timezone', 32)->nullable();
			$table->string('business_hour_start', 16)->nullable();
			$table->string('business_hour_end', 16)->nullable();
			$table->boolean('local_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_settings');
	}

}
