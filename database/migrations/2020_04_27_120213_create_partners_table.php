<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('venture_id');
	        $table->string('title');
	        $table->string('cover');
	        $table->timestamps();
	        $table->foreign('venture_id')
		        ->references('id')
		        ->on('ventures')
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
        Schema::dropIfExists('partners');
    }
}
