<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impacts', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->string('title');
	        $table->text('description');
	        $table->unsignedBigInteger('venture_impact_id');
	        $table->timestamps();
	        $table->foreign('venture_impact_id')
		        ->references('id')
		        ->on('venture_impacts')
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
        Schema::dropIfExists('impacts');
    }
}
