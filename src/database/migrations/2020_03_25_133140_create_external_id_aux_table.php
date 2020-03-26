<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalIdAuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_id_aux', function (Blueprint $table) {
            $table->string('external_id');
            $table->string('object_type');
            $table->integer('integration_system_id')->unsigned();
            $table->timestamps();
            $table->primary(['external_id', 'object_type','integration_system_id'],'external_id_aux_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_id_aux');
    }
}
