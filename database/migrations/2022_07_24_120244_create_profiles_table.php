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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users');
            $table->string('mobile_no')->nullable();
            $table->string('location')->nullable();
            $table->string('profile_photo')->nullable()->default(env('APP_URL')."/assets_general/defaultProfilePic.png");
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('bio')->nullable();
            $table->text('corporate_position')->nullable();
            $table->timestamps();
            $table->index("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
