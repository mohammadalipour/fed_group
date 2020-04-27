<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('user_id');
	        $table->unsignedInteger('usage_id');
	        $table->string('usage_type');
	        $table->unsignedInteger('count');
	        $table->timestamp('expired_at');
	        $table->timestamps();
	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
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
        Schema::dropIfExists('carts');
    }
}
