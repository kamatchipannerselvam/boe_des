<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObstockreqsTable extends Migration
{    public function up()
    {
		/***
		To update an existing table, we will use the Schema::table method:
		to create new table, we will use Schema::create
		**/
        Schema::dropIfExists('ob_stock_req');
        Schema::create('ob_stock_req', function (Blueprint $table) {
            $table->id('obstockreqid');
            $table->foreignId('inbstockinfoid');
            $table->foreignId('pdt_id');
            $table->string('hscode',150);
            $table->string('coo_code',250);
            $table->bigInteger('rqty');
	    $table->decimal('gw',10,3);
            $table->string('request_status',50);
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
        Schema::create('ob_stock_req', function (Blueprint $table) {
            Schema::dropIfExists('ob_stock_req');
        });
    }
    
}