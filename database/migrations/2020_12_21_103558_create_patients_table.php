<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('age');
            $table->string('medical_history')->nullable();
            $table->string('diagnoses')->nullable();
            $table->string('treatment')->nullable();
            $table->string('weight')->nullable();
            $table->string('BP')->nullable();
            $table->string('HR')->nullable();
            // $table->string('name');
            // $table->string('name');
            $table->foreignId('Doctor_id');
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
        Schema::dropIfExists('patients');
    }
}
