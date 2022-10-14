<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComingSoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coming_soons', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('page_tile')->nullable();
            $table->string('button_text')->nullable();
            $table->string('one')->nullable();
            $table->string('one_text')->nullable();
            $table->string('two')->nullable();
            $table->string('two_text')->nullable();
            $table->string('three')->nullable();
            $table->string('three_text')->nullable();
            $table->string('four')->nullable();
            $table->string('four_text')->nullable();
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
        Schema::dropIfExists('coming_soons');
    }
}
