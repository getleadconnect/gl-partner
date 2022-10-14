<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailVerfiedAtToBusinessAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_accounts', function (Blueprint $table) {
          $table->date('email_verified_at')->nullable();
          $table->integer('otp')->nullable();
            $table->boolean('admin_approved')->default(0)->comment('0:Inactive,1:Active,2:Pending approval,3:blocked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_accounts', function (Blueprint $table) {
            //
        });
    }
}
