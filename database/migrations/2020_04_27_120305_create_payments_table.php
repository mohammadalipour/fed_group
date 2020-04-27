<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->enum('status',['success','failed']);
	        $table->unsignedBigInteger('user_id');
	        $table->unsignedBigInteger('order_id');
	        $table->unsignedInteger('price');
	        $table->timestamps();
	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
		        ->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
