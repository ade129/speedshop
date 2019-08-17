<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('idservices');
            $table->string('code');
            $table->date('date_services');
            $table->text('description');
            $table->string('payments');//harga total yang akan tampil di costumer
            $table->string('changes');//kembalian 
            $table->string('grandtotal');// total semua harga service
            $table->softDeletes();
            $table->timestamps();
        });//database header service
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
