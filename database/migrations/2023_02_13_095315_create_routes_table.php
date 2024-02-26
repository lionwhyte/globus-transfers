<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('departure_location_name');
            $table->string('destination_location_name');
            $table->double('departure_location_lat');
            $table->double('departure_location_lng');
            $table->double('destination_location_lat');
            $table->double('destination_location_lng');
            $table->integer('distance_km');
            $table->string('duration');
            $table->integer('standardPrice');
            $table->integer('minivanPrice');
            $table->integer('minibusPrice');
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
        Schema::dropIfExists('routes');
    }
};
