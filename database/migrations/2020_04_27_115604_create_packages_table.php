<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->unsignedBigInteger('venture_id');
	        $table->string('title');
	        $table->text('description');
	        $table->unsignedInteger('count');
	        $table->unsignedInteger('price');
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
        Schema::dropIfExists('packages');
    }
}
