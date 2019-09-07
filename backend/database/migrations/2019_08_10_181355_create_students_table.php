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
            $table->boolean('status')->default(false);
            $table->string('reg');
            $table->boolean('regb')->default(false);
            $table->string('name');
            $table->boolean('nameb')->default(false);
            $table->string('email')->nullable($value = true);
            $table->boolean('emailb')->default(false);
            $table->string('pass');
            $table->string('tel')->nullable($value = true);
            $table->boolean('telb')->default(false);
            $table->string('nic')->nullable($value = true);
            $table->boolean('nicb')->default(false);
            $table->string('loc')->nullable($value = true);
            $table->boolean('locb')->default(false);
            $table->DATE('dob')->nullable($value = true);
            $table->boolean('dobb')->default(false);
            $table->string('course')->nullable($value = true);
            $table->boolean('courseb')->default(false);
            $table->string('level')->nullable($value = true);
            $table->boolean('levelb')->default(false);
            $table->DECIMAL('gpa')->nullable($value = true);
            $table->boolean('gpab')->default(false);
            $table->string('degree')->nullable($value = true);
            $table->boolean('degreeb')->default(false);
            $table->integer('duration')->nullable($value = true);
            $table->boolean('durationb')->default(false);
            $table->string('achiev')->nullable($value = true);
            $table->boolean('achievb')->default(false);
            $table->string('p1')->nullable($value = true);
            $table->boolean('p1b')->default(false);
            $table->string('p2')->nullable($value = true);
            $table->boolean('p2b')->default(false);
            $table->string('linkedin')->nullable($value = true);
            $table->boolean('linkedinb')->default(false);
            $table->string('github')->nullable($value = true);
            $table->boolean('githubb')->default(false);
            $table->string('image')->nullable($value = true);
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
