<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('zip_code',9);
            $table->string('street',255);
            $table->string('number',10);
            $table->string('district',255);
            $table->string('address_complement',255)->nullable();
            $table->string('city',255);
            $table->string('state',2);
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
        Schema::dropIfExists('service_locations');
    }
}
