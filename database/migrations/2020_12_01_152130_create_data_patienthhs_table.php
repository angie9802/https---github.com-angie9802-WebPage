<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPatienthhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_patienthhs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('temperatura');
            $table->integer('bpm');
            $table->float('sO2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_patienthhs');
    }
}
