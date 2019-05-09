<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('slug', 16);
			$table->integer('business_id')->unsigned();
			$table->string('name');
			$table->integer('fee')->unsigned()->default(0);
			$table->text('description', 65535);
			$table->boolean('show_on_booking_form')->default(0);
			$table->integer('duration_hours')->unsigned()->nullable();
			$table->integer('duration_minutes')->unsigned()->nullable();
			$table->integer('category_id')->unsigned();
			$table->string('image')->nullable();
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
		Schema::drop('services');
	}

}
