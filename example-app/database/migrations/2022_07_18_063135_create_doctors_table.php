<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doctor_name');
            $table->string('practice_certificate');
            $table->string('doctor_email');
            $table->string('doctor_phone');
            $table->string('cat_id');
            $table->string('cat_name');
            $table->string('doctor_img')->nullable();
            $table->text('doctor_des')->nullable();
            // $table->time('time_available')->nullable();
            $table->integer('clinic_id');
            $table->boolean('is_delete')->default('0');
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
        Schema::dropIfExists('doctors');
    }
}
