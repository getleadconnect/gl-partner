<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGitLabLoginSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('git_lab_login_settings', function (Blueprint $table) {
            $table->id();
            $table->string('cilent_id')->nullable();
            $table->string('cilent_secret_key')->nullable();
            $table->string('call_back_url')->nullable();
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
        Schema::dropIfExists('git_lab_login_settings');
    }
}
