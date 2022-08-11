<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('clinic_id');
            $table->string('clinic_name');
            $table->string('clinic_email')->unique();
            $table->integer('clinic_phone');
            $table->string('clinic_cat');
            $table->string('clinic_img')->nullable();
            $table->integer('commercial_register')->nullable();
            $table->text('clinic_des')->nullable();
            $table->string('clinic_bdes')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            // $table->time('time_available')->nullable();
            // $table->date('time_available')->nullable();
            $table->string('clinic_location')->nullable();
            $table->boolean('is_accepted')->default('0');


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
        Schema::dropIfExists('clinics');
    }
}
