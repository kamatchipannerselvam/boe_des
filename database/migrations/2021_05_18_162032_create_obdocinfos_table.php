<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObdocinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('ob_doc_info');
        Schema::create('ob_doc_info', function (Blueprint $table) {
            $table->id('obdocinfoid');
			$table->string('refno',150);
			$table->string('customer_name',150);
			$table->string('transferto',150);
			$table->string('currency',150);
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
        Schema::dropIfExists('ob_doc_info');
    }
}