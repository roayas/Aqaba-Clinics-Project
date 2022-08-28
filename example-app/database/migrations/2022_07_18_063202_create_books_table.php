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
            $table->string('doctor_name')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('clinic_id');
            $table->integer('ins_name')->nullable();
            $table->text('note')->nullable();
            $table->string('user_id_num')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_lname')->nullable();
            $table->integer('user_phone')->nullable();
            $table->date('user_dob')->nullable();
            $table->dateTime('time_book');
            $table->string('admin_add')->nullable();
            $table->boolean('is_cancel_user')->default('0');
            $table->boolean('is_cancel_admin')->default('0');
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
