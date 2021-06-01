<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('m_customer');
        Schema::create('m_customer', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name',250);
            $table->string('address1',250)->nullable();
			$table->string('address2',250)->nullable();
			$table->string('emirsal_code',25);
			$table->string('city',50)->nullable();
			$table->string('country',50)->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('m_customer');
    }
}