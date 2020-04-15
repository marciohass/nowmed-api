<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['EXAME', 'CONSULTA', 'TERAPIA']);
            $table->date('date');
            $table->decimal('price', 8, 2);
            $table->bigInteger('id_patient')->unsigned();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->bigInteger('id_exam')->unsigned();
            $table->foreign('id_exam')->references('id')->on('exams');
            $table->bigInteger('id_specialist')->unsigned();
            $table->foreign('id_specialist')->references('id')->on('specialists');
            $table->bigInteger('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');
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
        Schema::dropIfExists('patient_requests');
    }
}
