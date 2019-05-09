<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('action_type')->nullable();
            $table->text('schedule')->nullable();
            $table->text('details')->nullable();
            $table->text('content')->nullable();
            $table->text('youtube')->nullable();
            $table->text('call_us')->nullable();
            $table->text('make_payment')->nullable();
            $table->text('map')->nullable();
            // ------------------- Portal Invite -------------------
            $table->text('invitation_label')->nullable();
            $table->text('invitation_title')->nullable();
            $table->text('invitation_text')->nullable();
            // ------------------- Portal Settings -------------------
            $table->boolean('desktop_view')->nullable();
            $table->boolean('auto_desktop_view')->nullable();
            $table->integer('auto_desktop_view_after')->nullable()->unsigned();
            $table->boolean('mobile_view')->nullable();
            $table->boolean('auto_mobile_view')->nullable();
            $table->integer('auto_mobile_view_after')->nullable()->unsigned();
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
        Schema::dropIfExists('website_widgets');
    }
}
