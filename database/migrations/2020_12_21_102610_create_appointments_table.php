<?php

use App\Models\Clinic\Doctor;
use App\Models\Clinic\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_age');
            $table->string('patient_address');
            $table->string('patient_phone');
            $table->string('price');
            $table->string('status')->default('pending');
            $table->date('delayed_to')->nullable();
            $table->foreignIdFor(Patient::class, 'patient_id')->nullable();
            $table->date('date');
            $table->time('time');
            $table->foreignIdFor(Doctor::class, 'Doctor_id');
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
        Schema::dropIfExists('appointments');
    }
}
