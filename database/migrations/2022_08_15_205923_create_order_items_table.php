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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->uuid('order_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->uuid('inventory_item_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('amount')->nullable();
            $table->string('discount')->nullable();
            $table->boolean('status')->default(True);
            $table->timestamps();

            $table->index("order_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
