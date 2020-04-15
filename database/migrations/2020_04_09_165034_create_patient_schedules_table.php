<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['EXAME', 'CONSULTA', 'TERAPIA']);
            $table->dateTime('date_hour');
            $table->bigInteger('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');
            $table->bigInteger('id_specialist')->unsigned();
            $table->foreign('id_specialist')->references('id')->on('specialists');
            $table->bigInteger('id_patient')->unsigned();
            $table->foreign('id_patient')->references('id')->on('patients');
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
        Schema::dropIfExists('patient_schedules');
    }
}
