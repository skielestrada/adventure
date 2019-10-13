<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_class', function (Blueprint $table) {
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();

            $table->foreign('race_id')->references('id')->on('races');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_class');
    }
}
