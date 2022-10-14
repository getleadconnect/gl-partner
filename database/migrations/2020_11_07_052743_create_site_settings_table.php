<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_avatar')->nullable();
            $table->string('favicon_avatar')->nullable();
            $table->string('logo_text')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_name')->nullable();
            $table->text('project_description')->nullable();
            $table->string('domain')->nullable();
            $table->string('mobile')->nullable();
             $table->string('email')->nullable();
             $table->string('copy_right')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
}
