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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('invoice_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->text('description')->nullable();
            $table->string('paid_status',51)->nullable();
            $table->double('total_amount_paid')->nullable();
            $table->double('total_amount_due')->nullable();
            $table->double('total_amount')->nullable();
            $table->date('date')->nullable();
            $table->text('payment_link')->nullable()->comment("a url that a user can pay with");
            $table->foreignId("user_id")->nullable()->comment("the user who created this payment");
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
        Schema::dropIfExists('payments');
    }
};
