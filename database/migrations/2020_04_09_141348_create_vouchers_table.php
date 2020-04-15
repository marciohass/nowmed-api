<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',11);
            $table->decimal('price', 8, 2);
            $table->date('registration_date');
            $table->date('date_use')->nullable();
            $table->bigInteger('id_patient')->unsigned();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->bigInteger('id_status')->unsigned();
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
        Schema::dropIfExists('vouchers');
    }
}
