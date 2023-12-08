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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId("user_id")->references('id')->on('users');
            $table->foreignId("team_id")->nullable();
            $table->string("name");
            $table->integer("category_id")->nullable();
            $table->text("description")->nullable();
            $table->float("purchase_price");
            $table->string("currency");
            $table->float("resell_price")->nullable();
            $table->integer("quantity")->default(0);
            $table->string("sku")->nullable();
            $table->string("manufacturer")->nullable();
            $table->string("barcode")->nullable();
            $table->foreignId("barcode_type_id")->nullable();
            $table->string("image_path")->nullable();
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
        Schema::dropIfExists('inventory_items');
    }
};
