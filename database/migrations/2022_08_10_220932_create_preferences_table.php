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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->nullable();
            $table->string('currency')->nullable()->default('USD');
            $table->string('secondary_currency')->nullable();
            $table->string('theme')->nullable();
            $table->string('view_type')->nullable();
            $table->string('timezone')->nullable();
            $table->string('alerts')->nullable();
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
        Schema::dropIfExists('preferences');
    }
};
