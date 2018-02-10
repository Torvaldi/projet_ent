<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthday')->nullable();
            $table->char('telephone', 10)->unique()->nullable();
            $table->char('city', 100)->nullable();
            $table->char('cp', 5)->nullable();
            $table->text('address')->nullable();
            $table->boolean('isDelegate')->nullable();

            $table->integer('semester')->unsigned()->nullable();
            $table->foreign('semester')->references('id')->on('semesters')->onDelete('cascade');

            $table->integer('promotion')->unsigned()->nullable();
            $table->foreign('promotion')->references('id')->on('promotions')->onDelete('cascade');

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
