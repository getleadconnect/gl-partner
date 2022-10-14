<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   Schema::table('project_owners', function (Blueprint $table) {
          $table->string('address')->nullable()->change();
          $table->string('mobile')->nullable()->change();
          $table->string('email')->nullable()->change();
             

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
