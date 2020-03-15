<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartialDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partial_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_locations_id')->nullable();
            $table->integer('locations_id')->nullable();
            $table->string('qty')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('partial_deliveries');
    }
}
