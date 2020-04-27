<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('order_id');
	        $table->string('usage_type');
	        $table->unsignedInteger('count');
	        $table->unsignedInteger('price');
	        $table->timestamps();
	        $table->foreign('order_id')
		        ->references('id')
		        ->on('orders')
		        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
