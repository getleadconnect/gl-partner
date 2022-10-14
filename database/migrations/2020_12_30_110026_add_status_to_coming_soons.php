<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToComingSoons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coming_soons', function (Blueprint $table) {
             $table->boolean('status')->default(1)->comment('0:Inactive,1:Active,2:Pending approval,3:blocked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coming_soons', function (Blueprint $table) {
            //
        });
    }
}
