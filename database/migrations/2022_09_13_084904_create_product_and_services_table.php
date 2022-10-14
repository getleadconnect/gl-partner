<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAndServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_and_services', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name',100);
            $table->integer('type')->comment('1-product,2-service');
            $table->integer('users');
            $table->integer('month');
            $table->bigInteger('pricing');
            $table->integer('added_by')->unsigned();
            $table->foreign('added_by')->references('id')->on('users');
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
        Schema::dropIfExists('product_and_services');
    }
}
