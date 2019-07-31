<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('index');
            $table->string('pass');
            $table->string('name');
            $table->string('email');
            $table->integer('tel');
            $table->string('nic');
            $table->string('loc');
            $table->DATE('dob');
            $table->string('course');
            $table->DECIMAL('gpa');
            $table->string('degree');
            $table->integer('duration');
            $table->string('achiev');
            $table->string('p1');
            $table->string('p2');
            $table->string('linkedin');
            $table->string('github');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
