<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientshhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patientshhs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('temperatura');
            $table->integer('bpm');
            $table->float('sO2');
            $table->float('ac_x');
            $table->float('ac_y');
            $table->float('ac_z');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patientshhs');
    }
}
