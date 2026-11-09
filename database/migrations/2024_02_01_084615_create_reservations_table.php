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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->integer('total_price');
            $table->boolean('round_trip')->default(false);
            $table->string('vehicle');
            $table->integer('passengers');
            $table->string('pick_up_address');
            $table->string('destination_address');
            $table->date('departure_date');
            $table->time('pickup_time', 0);
            $table->string('payment_option');
            $table->string('invoice_id')->nullable();
            $table->string('stripe_order_id')->nullable();
            $table->string('paypal_order_id')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
