<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVisualizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visualizations', function( Blueprint $table ) {
            $table->unsignedBigInteger('apartment_id')->after('visual_ip');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visualizations', function( Blueprint $table ) {
            $table->dropForeign('apartment_id');
            $table->dropColumn('apartment_id');
        });
    }
}
