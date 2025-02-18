<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('pickupAddress');
            $table->string('pickupName');
            $table->string('pickupContact');
            $table->string('pickupEmail');
            $table->string('deliveryAddress');
            $table->string('deliveryName');
            $table->string('deliveryContact');
            $table->string('deliveryEmail');
            $table->integer('packageId');
            $table->integer('deliveryProviderId');
            $table->integer('priorityId');
            $table->integer('pickupDate');
            $table->integer('pickupTime');
            $table->integer('status');
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
        Schema::dropIfExists('deliveries');
    }
}
