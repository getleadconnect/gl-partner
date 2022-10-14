<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserNameAndPasswordToBusinessAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_accounts', function (Blueprint $table) {
            $table->string('user_name')->nullable();
            $table->text('password')->nullable();
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
            $table->dropColumn(['user_name', 'password']);
        });
    }
}
