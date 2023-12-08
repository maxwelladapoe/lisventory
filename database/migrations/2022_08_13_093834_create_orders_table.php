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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('date')->nullable();
            $table->string('description')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('status')->default(True)->comment('0=Pending, 1= Approved');
            $table->uuid('customer_id')->nullable();
            $table->string('tax')->nullable();
            $table->string('payment_mode')->nullable();
            $table->boolean('payment_status')->default(False)->comment('0=Pending, 1= Payed');
            $table->string('discount')->nullable();
            $table->string('total')->nullable();
            $table->boolean('shipped_status')->default(False)->comment('0=Pending, 1= Shipped');;
            $table->date('shipping_date')->nullable();
            $table->string('shipper_id')->nullable();
            $table->text('current_location')->nullable();
            $table->uuid('user_id')->nullable();
            $table->uuid('team_id')->nullable();
            $table->uuid('updated_by')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
