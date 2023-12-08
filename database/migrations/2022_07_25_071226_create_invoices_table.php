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
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('invoice_no')->nullable();
            $table->dateTime('date')->nullable();
            $table->date('due_date')->nullable();
            $table->text('description')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('status')->default(False)->comment('0=pending, 1= Approved');
            $table->foreignId("user_id")->comment("user id of creator");
            $table->foreignId('team_id')->nullable()->comment("team id of creator");
            $table->uuid('customer_id')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
