<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInbgwTable extends Migration
{
    public function up()
    {
		/***
		To update an existing table, we will use the Schema::table method:
		to create new table, we will use Schema::create
		**/
        Schema::dropIfExists('inb_gw_info');
        Schema::create('inb_gw_info', function (Blueprint $table) {
            $table->id('inbgwinfoid');
            $table->foreignId('inbdocinfoid');
            $table->string('hscode',150);
            $table->string('coo_code',250);
            $table->bigInteger('tqty');
            $table->decimal('tprice',10,3);
			$table->decimal('gw',10,3);
			$table->decimal('o_pugw',10,3); //original per unit grass wait
			$table->decimal('a_pugw',10,3); //available per unit grass wait
            $table->string('dc_status',50);
            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
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
        Schema::create('inb_gw_info', function (Blueprint $table) {
            Schema::dropIfExists('inb_gw_info');
        });
    }
}
