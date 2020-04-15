<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistMultipleServiceLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialist_multiple_service_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_sslocation')->unsigned();
            $table->foreign('id_sslocation')->references('id')->on('specialist_service_locations');
            $table->bigInteger('id_specialist')->unsigned();
            $table->foreign('id_specialist')->references('id')->on('specialists');
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
        Schema::dropIfExists('specialist_multiple_service_locations');
    }
}
