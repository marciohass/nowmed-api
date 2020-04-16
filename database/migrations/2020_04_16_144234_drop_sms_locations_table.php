<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSmsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialist_multiple_service_locations', function ($table) {

            $table->dropForeign('specialist_multiple_service_locations_id_sslocation_foreign');
            $table->dropForeign('specialist_multiple_service_locations_id_specialist_foreign');
        });

        Schema::dropIfExists('specialist_multiple_service_locations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
