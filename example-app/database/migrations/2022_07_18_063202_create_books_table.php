<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('clinic_name');
            $table->string('doctor_name');
            $table->integer('user_id')->nullable();
            $table->integer('ins_name');
            $table->text('note')->nullable();
            $table->integer('user_id_num');
            $table->string('user_name');
            $table->integer('user_phone');
            $table->date('user_dob');
            $table->dateTime('time_book');
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
        Schema::dropIfExists('books');
    }
}
