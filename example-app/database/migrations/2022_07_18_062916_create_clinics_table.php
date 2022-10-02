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
            $table->bigIncrements('id');
            $table->string('clinic_name');
            $table->string('clinic_license')->nullable();
            $table->string('clinic_email')->unique();
            $table->string('clinic_phone')->nullable();
            $table->string('pass');
            $table->string('cat_id')->nullable();
            $table->string('clinic_img')->nullable();
            $table->integer('commercial_register')->nullable();
            $table->string('clinic_short_des')->nullable();
            $table->text('clinic_des')->nullable();
            $table->string('clinic_bdes')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->string('day_1_off')->nullable();
            $table->string('day_2_off')->nullable();
            $table->string('app_length')->nullable();
            $table->decimal('iteration', $precision = 8, $scale = 4)->nullable();
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
