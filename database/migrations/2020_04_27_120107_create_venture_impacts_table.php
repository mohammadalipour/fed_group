<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentureImpactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venture_impacts', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->string('title');
	        $table->unsignedBigInteger('venture_id');
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
        Schema::dropIfExists('venture_impacts');
    }
}
