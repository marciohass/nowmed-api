<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistTherapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialist_therapies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('specialist_id')->unsigned();
            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->bigInteger('therapy_id')->unsigned();
            $table->foreign('therapy_id')->references('id')->on('therapies');
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
        Schema::dropIfExists('specialist_therapies');
    }
}
