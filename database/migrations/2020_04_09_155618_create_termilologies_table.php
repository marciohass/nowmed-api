<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermilologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termilologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tuss_code', 11);
            $table->string('tuss', 255);
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
        Schema::dropIfExists('termilologies');
    }
}
