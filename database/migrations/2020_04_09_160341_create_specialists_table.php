<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->date('birthdate');
            $table->string('cpf', 14);
            $table->string('crm', 15);
            $table->string('cnh', 11)->nullable();
            $table->string('email', 255);
            $table->string('telephone1', 14);
            $table->string('telephone2', 14)->nullable();
            $table->bigInteger('id_specialization')->unsigned();
            $table->foreign('id_specialization')->references('id')->on('specializations');
            $table->bigInteger('id_therapy')->unsigned();
            $table->foreign('id_therapy')->references('id')->on('therapies');
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
        Schema::dropIfExists('specialists');
    }
}
