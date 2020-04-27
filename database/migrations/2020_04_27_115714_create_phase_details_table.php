<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_details', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('phase_id');
	        $table->string('title');
	        $table->text('description');
	        $table->unsignedInteger('duration');
	        $table->string('icon');
	        $table->timestamps();
	        $table->foreign('phase_id')
		        ->references('id')
		        ->on('phases')
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
        Schema::dropIfExists('phase_details');
    }
}
