<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_schedules', function (Blueprint $table) {
            $table->bigIncrements('time_id');
            $table->integer('doctor_id')->nullable();
            $table->integer('clinic_id');
            $table->integer('user_id');
            $table->time('time_detail');
            $table->date('time_detail');
            $table->boolean('is_cancel_user')->default('0');
            $table->boolean('is_cancel_admin')->default('0');
            $table->boolean('is_taken')->default('0');
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
        Schema::dropIfExists('time_schedules');
    }
}
