<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->increments('idspareparts');
            $table->integer('idcategories');
            $table->string('namespareparts');
            $table->string('codespareparts');
            $table->string('image');
            $table->string('brand');
            $table->string('price');//harga yang tampil di costumer
            $table->string('actcost');//harga dasar barang
            $table->string('forecast');//laba
            $table->string('unit');
            $table->boolean('active');
            $table->softDeletes();
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
        Schema::dropIfExists('spareparts');
    }
}
