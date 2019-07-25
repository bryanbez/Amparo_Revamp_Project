<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservation', function (Blueprint $table) {
            $table->increments('request_form_no');
            $table->date('date_request_occupy');
            $table->string('time_request_occupy');
            $table->text('request_use_facilities');
            $table->string('requested_group');
            $table->string('requested_group_contact');
            $table->string('requested_group_email');
            $table->integer('people_count');
            $table->string('reserve_purpose');
            $table->string('reserve_status');
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
        Schema::dropIfExists('tbl_reservation');
    }
}
