<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('address');
            $table->float('price', 8, 2);
            $table->smallInteger('number_of_rooms');
            $table->smallInteger('number_of_bathrooms');
            $table->smallInteger('square_meters');
            $table->string('src')->unique();
            $table->float('address_lat', 10, 7);
            $table->float('address_lng', 10, 7);
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
