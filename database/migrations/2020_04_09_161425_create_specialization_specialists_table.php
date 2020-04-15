<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialization_specialists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_specialist')->unsigned();
            $table->foreign('id_specialist')->references('id')->on('specialists');
            $table->bigInteger('id_specialization')->unsigned();
            $table->foreign('id_specialization')->references('id')->on('specializations');
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
        Schema::dropIfExists('specialization_specialists');
    }
}
