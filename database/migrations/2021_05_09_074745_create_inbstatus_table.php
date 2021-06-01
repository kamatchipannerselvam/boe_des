<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInbstatusTable extends Migration
{
    public function up()
    {
		/***
		To update an existing table, we will use the Schema::table method:
		to create new table, we will use Schema::create
		**/
        Schema::dropIfExists('inb_doc_status');
        Schema::create('inb_doc_status', function (Blueprint $table) {
            $table->id('inbdocstatusid');
            $table->foreignId('inbdocinfoid');
            $table->bigInteger('total_qty');
            $table->decimal('total_value',10,3);
			$table->decimal('total_gw',10,3);
			$table->string('boe_passed_by',250)->nullable();
			$table->string('airway_bill_no',250)->nullable();
			$table->date('submission_date')->nullable();
			$table->text('remarks')->nullable();
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
        Schema::create('inb_doc_status', function (Blueprint $table) {
            Schema::dropIfExists('inb_doc_status');
        });
    }
}
