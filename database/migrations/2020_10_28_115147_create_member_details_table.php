<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id');
			$table->string('name',100);
			$table->string('email',100);
			$table->string('contact_number',100);
			$table->string('designation',100);
			$table->string('founder_name',100);
			$table->string('startup_name',100);
			$table->string('company_founded',100);
			$table->tinyinteger('co_founders');
			$table->string('company_logo',100);
			$table->string('city',100);
			$table->string('state',100);
			$table->string('country',100);
			$table->string('external_funding',50)->nullable();
			$table->string('requirement_fund',300)->nullable();
			$table->string('description',150);
			$table->string('elevator_pitch',150);
			$table->string('pitch_summary',350);
			$table->string('describe_company',50);
			$table->string('website',100);
			$table->string('mobile_app_link',200);
			$table->string('facebook',200)->nullable();
			$table->string('twitter',200)->nullable();
			$table->string('instagram',200)->nullable();
			$table->string('linkedin',200)->nullable();
			$table->string('pitch_deck',100);
			$table->string('poc_model_mvp',20);
			$table->string('investors',20);
			$table->string('stage_of_startup',50);
			$table->string('sector',100);
			$table->tinyinteger('like_operation')->nullable();
			$table->string('investor_round',20)->nullable();
			$table->string('geographical_area',50)->nullable();
			$table->string('investor_prference',50)->nullable();
			$table->string('member_volunteers',20)->nullable();
			$table->tinyinteger('status')->nullable();
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
        Schema::dropIfExists('member_details');
    }
}
