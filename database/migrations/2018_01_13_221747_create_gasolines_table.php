<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasolinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasolines', function (Blueprint $table) {
            $table->increments('id');
            $table->string("location")->nullable();
            $table->integer("cp");
            $table->string("schedule")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->integer("town_id")->unsigned();
            $table->integer("province_id")->unsigned();
            $table->double("gasoleo_A")->nullable();
            $table->double("gasoleo_B")->nullable();
            $table->double("gasolina_95_proteccion")->nullable();
            $table->double("gasolina_98")->nullable();
            $table->double("nuevo_gasoleo_A")->nullable();



            $table->timestamps();
        });

        Schema::table('gasolines', function (Blueprint $table) {
            $table->foreign('town_id')->references('id')->on('towns');


            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gasolines');
    }
}