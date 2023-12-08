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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->uuid('inventory_item_id')->nullable();
            $table->uuid('supplier_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_status')->default(False)->comment('0=Pending, 1= Delivered');;

            $table->foreignId("user_id")->references('id')->on('users')->nullable();
            $table->foreignId('team_id')->references('id')->on('teams')->nullable();

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
        Schema::dropIfExists('purchases');
    }
};
