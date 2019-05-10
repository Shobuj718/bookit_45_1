<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');      
            $table->integer('user_id');
            $table->integer('manage_client_records')->default(0);
            $table->integer('send_email_sms_promotions')->default(0);
            $table->integer('send_email_sms_reminders')->default(0);
            $table->integer('add_online_scheduling')->default(0);
            $table->integer('invoices_estimates')->default(0);
            $table->integer('accept_payments')->default(0);
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
        Schema::dropIfExists('business_needs');
    }
}
