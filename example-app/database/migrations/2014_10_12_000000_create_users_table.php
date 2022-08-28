<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('user_lname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_phone')->nullable();
            $table->date('user_dob')->nullable();
            $table->string('img')->nullable();
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->enum('marital', ['single','married'])->nullable();
            $table->string('user_id_num')->unique()->nullable();
            $table->decimal('height', $precision = 8, $scale = 2)->nullable();
            $table->decimal('weight', $precision = 8, $scale = 2)->nullable();
            $table->enum('blood_type',['A+','A-','B+','B-','AB','O+','O-'])->nullable();
            $table->boolean('is_admin1')->default('0');
            $table->boolean('is_admin2')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
