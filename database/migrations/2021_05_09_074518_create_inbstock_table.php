<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInbstockTable extends Migration
{
    public function up()
    {
		/***
		To update an existing table, we will use the Schema::table method:
		to create new table, we will use Schema::create
		**/
        Schema::dropIfExists('inb_stock_info');
        Schema::create('inb_stock_info', function (Blueprint $table) {
            $table->id('inbstockinfoid');
            $table->foreignId('inbdocinfoid');
            $table->foreignId('pdt_id');
            $table->string('hscode',150);
            $table->string('coo_code',250);
            $table->bigInteger('qty');
			$table->decimal('unit_price',10,3);
			$table->decimal('total_price',10,3);
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
        Schema::create('inb_stock_info', function (Blueprint $table) {
            Schema::dropIfExists('inb_stock_info');
        });
    }
}
