<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_usages', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('user_id');
	        $table->unsignedBigInteger('order_id');
	        $table->unsignedBigInteger('voucher_id');
	        $table->boolean('is_expired');
	        $table->timestamps();
	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
		        ->onDelete('cascade');
	        $table->foreign('order_id')
		        ->references('id')
		        ->on('orders')
		        ->onDelete('cascade');
	        $table->foreign('voucher_id')
		        ->references('id')
		        ->on('vouchers')
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
        Schema::dropIfExists('voucher_usages');
    }
}
