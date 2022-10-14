<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_partners', function (Blueprint $table) {
            $table->id();
             $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('company_name')->nullable();
            $table->string('email')->nullable();
           $table->string('website')->nullable();
           $table->string('team_size')->nullable();
           $table->string('country')->nullable();
           $table->string('state')->nullable();
           $table->string('city')->nullable();
           $table->string('pin_code')->nullable(); 
             $table->string('user_id')->nullable(); 
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
        Schema::dropIfExists('channel_partners');
    }
}
