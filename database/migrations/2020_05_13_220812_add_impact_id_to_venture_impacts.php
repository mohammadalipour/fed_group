<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImpactIdToVentureImpacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venture_impacts', function (Blueprint $table) {
	        $table->unsignedBigInteger('impact_id')->after('venture_id');
	        $table->foreign('impact_id')
		        ->references('id')
		        ->on('impacts')
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
        Schema::table('venture_impacts', function (Blueprint $table) {
            //
        });
    }
}
