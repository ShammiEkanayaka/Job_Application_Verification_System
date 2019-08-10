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
           // $table->increments('id');
            $table->string('index');
            $table->primary(['index']);
            $table->string('pass');
            $table->string('name');
            $table->string('email')->nullable($value = true);
            $table->integer('tel')->nullable($value = true);
            $table->string('nic')->nullable($value = true);
            $table->string('loc')->nullable($value = true);
            $table->DATE('dob')->nullable($value = true);
            $table->string('course')->nullable($value = true);
            $table->DECIMAL('gpa')->nullable($value = true);
            $table->string('degree')->nullable($value = true);
            $table->integer('duration')->nullable($value = true);
            $table->string('achiev')->nullable($value = true);
            $table->string('p1')->nullable($value = true);
            $table->string('p2')->nullable($value = true);
            $table->string('linkedin')->nullable($value = true);
            $table->string('github')->nullable($value = true);
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
        Schema::dropIfExists('students');
    }
}
