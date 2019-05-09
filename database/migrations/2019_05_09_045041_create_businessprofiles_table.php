<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('industry_id')->unsigned();
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('profession_id')->unsigned();
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('country_with_code')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('persons')->nullable();
            $table->string('web_url')->nullable();
            $table->string('address')->nullable();
            $table->string('present_number_address')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessprofiles');
    }
}
