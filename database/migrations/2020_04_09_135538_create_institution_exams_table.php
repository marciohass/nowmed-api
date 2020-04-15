<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_institution')->unsigned();
            $table->foreign('id_institution')->references('id')->on('institutions');
            $table->bigInteger('id_exam')->unsigned();
            $table->foreign('id_exam')->references('id')->on('exams');
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
        Schema::dropIfExists('institution_exams');
    }
}
