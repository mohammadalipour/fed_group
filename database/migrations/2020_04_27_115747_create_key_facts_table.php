<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_facts', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('venture_id');
	        $table->unsignedInteger('usage_id');
	        $table->string('usage_type');
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
        Schema::dropIfExists('key_facts');
    }
}
