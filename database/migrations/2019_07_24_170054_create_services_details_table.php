<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_details', function (Blueprint $table) {
            $table->increments('idservicesdetails');
            $table->integer('idspareparts'); // sparepart
            $table->integer('idservices');
            $table->integer('unit'); // quantity
            $table->string('totalharga'); // total harga dari jumlah quantity (otomatis)
            $table->softDeletes();
            $table->timestamps();
        }); // database field(isi)service(detailservice)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_details');
    }
}
