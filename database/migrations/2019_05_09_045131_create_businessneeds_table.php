<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessneedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessneeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('manage_client_records')->nullable();
            $table->string('send_email_sms_promotions')->nullable();
            $table->string('send_email_sms_remiders')->nullable();
            $table->string('add_online_scheduling')->nullable();
            $table->string('invoices_estimates')->nullable();
            $table->string('accept_payments')->nullable();
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
        Schema::dropIfExists('businessneeds');
    }
}
