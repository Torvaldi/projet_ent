<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('value');
            $table->timestamps();

            $table->integer('module')->unsigned();
            $table->foreign('module')->references('id')->on('modules')->onDelete('cascade');

            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('prof_id')->unsigned();
            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
