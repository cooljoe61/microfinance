<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('oname')->nullable();
            $table->string('idnum')->nullable();
            $table->string('phonenum')->nullable();
            $table->string('dob')->nullable();
            $table->string('location')->nullable();
            $table->string('mstatus')->nullable();
            $table->string('nok')->nullable();
            $table->string('email')->nullable();
            $table->string('accnum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
