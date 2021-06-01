<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveboeinbTable extends Migration
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
        Schema::dropIfExists('inb_doc_info');
        Schema::create('inb_doc_info', function (Blueprint $table) {
            $table->id('inbdocinfoid');
            $table->date('boe_date');
            $table->string('boe_number',150);
            $table->string('vendor_name',250);
            $table->string('currency',25);
            $table->string('invoice_no',100)->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('refno',150);
            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
            $table->string('dc_status',50);
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
        Schema::create('inb_doc_info', function (Blueprint $table) {
            Schema::dropIfExists('inb_doc_info');
        });
    }
}
