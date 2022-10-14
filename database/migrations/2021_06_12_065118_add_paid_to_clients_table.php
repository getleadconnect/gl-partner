<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
           $table->string('company_name')->nullable();
           $table->string('business_category_id')->nullable();
           $table->string('country')->nullable();
           $table->string('state')->nullable();
           $table->string('area')->nullable();
           $table->string('pincode')->nullable();
           $table->string('address')->nullable(); 


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
