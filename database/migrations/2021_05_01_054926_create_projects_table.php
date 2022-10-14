<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('project_name')->nullable();
        $table->string('description')->nullable();
        $table->bigInteger('project_type')->unsigned();
        $table->foreign('project_type')->references('id')->on('project_types')->onDelete('cascade');
        $table->string('project_value')->nullable();
        $table->bigInteger('project_owner')->unsigned();
        $table->foreign('project_owner')->references('id')->on('project_owners')->onDelete('cascade');
        $table->bigInteger('project_status')->unsigned();
        $table->foreign('project_status')->references('id')->on('project_statuses')->onDelete('cascade');
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
    Schema::dropIfExists('projects');
}
}
