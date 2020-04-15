<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['EXAME', 'CONSULTA', 'TERAPIA']);
            $table->date('date');
            $table->bigInteger('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');
            $table->decimal('price', 8, 2);
            $table->bigInteger('id_patient')->unsigned();
            $table->foreign('id_patient')->references('id')->on('patients');
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
        Schema::dropIfExists('customer_services');
    }
}
