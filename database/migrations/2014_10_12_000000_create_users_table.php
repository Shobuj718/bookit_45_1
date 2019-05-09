<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 16);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('display_name')->nullable();
            $table->boolean('display_email')->default(0);
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('phone')->nullable();
            $table->string('professional_title')->nullable();
            $table->string('language')->nullable();
            $table->string('color')->nullable();
            $table->integer('business_id')->unsigned()->nullable();
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
