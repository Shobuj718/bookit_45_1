<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');      
            $table->integer('user_id');
            $table->integer('industry_id')->nullable();
            $table->integer('profession_id')->nullable();
            $table->string('country_with_code')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('persons')->nullable();
            $table->string('web_url')->nullable();
            $table->string('address')->nullable();
            $table->integer('present_number_address')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('business_profiles');
    }
}
