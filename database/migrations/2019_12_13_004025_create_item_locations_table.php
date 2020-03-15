<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_sub_no', 255);
            $table->string('po_sub_id', 255)->nullable();
            $table->integer('posubitemline')->length(11)->nullable();
            $table->string('WarehouseLocation', 255)->nullable();
            $table->dateTime('ModifiedOn')->nullable();
            $table->string('JobDescription', 255)->nullable();
            $table->string('Vendor', 255)->nullable();
            $table->string('ShippedVia', 255)->nullable();
            $table->string('AmountonOrder', 255)->nullable();
            $table->string('UnitofMeasure', 255)->nullable();
            $table->string('Salesperson', 255)->nullable();
            $table->string('Reference', 255)->nullable();
            $table->string('Buyer', 255)->nullable();
            $table->string('JobNumber', 255)->nullable();
            $table->longText('ProductDescription')->nullable();
            $table->dateTime('EstDeliveryDate')->nullable();
            $table->string('WarehouseNotes', 255)->nullable();
            $table->string('ShiptoWarehouse', 255)->nullable();
            $table->string('JobName', 255)->nullable();
            $table->dateTime('CompleteReceived_Date')->nullable();
            $table->string('CompleteReceived_QTY', 255)->nullable();
            $table->string('EmailAddress', 255)->nullable();
            $table->string('ProjectManager', 255)->nullable();
            $table->string('ProjectManagerEmail', 255)->nullable();
            $table->binary('SSMA_TimeStamp', 8)->nullable();
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
        Schema::dropIfExists('item_locations');
    }
}
