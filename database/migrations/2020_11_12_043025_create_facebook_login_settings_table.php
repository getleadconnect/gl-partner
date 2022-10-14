<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookLoginSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_login_settings', function (Blueprint $table) {
            $table->id();
            $table->string('cilent_id')->nullable();
            $table->string('cilent_secret_key')->nullable();
            $table->string('call_back_url')->nullable();
            $table->boolean('status')->default(1)->comment('0:Inactive,1:Active,2:Pending approval,3:blocked');
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
        Schema::dropIfExists('facebook_login_settings');
    }
}
