<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFisioPatienthhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisio_patienthhs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('ac_x');
            $table->float('ac_y');
            $table->float('ac_z');
            $table->float('gi_x');
            $table->float('gi_y');
            $table->float('gi_z');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fisio_patienthhs');
    }
}
