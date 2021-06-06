<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObstockinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		/***
		To update an existing table, we will use the Schema::table method:
		to create new table, we will use Schema::create
		**/
        Schema::dropIfExists('ob_stock_info');
        Schema::create('ob_stock_info', function (Blueprint $table) {
            $table->id('obstockinfoid');
            $table->foreignId('pdt_id');
            $table->string('hscode',150);
            $table->string('coo_code',250);
            $table->bigInteger('total_rqty');
            $table->bigInteger('gw');
            $table->decimal('price',10,3)->nullable();
            $table->decimal('linetotal',10,3)->nullable();
            $table->text('inbstockref');
            $table->text('boereference');
            $table->string('ob_status',50);
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
        Schema::dropIfExists('ob_stock_info');
    }
}
