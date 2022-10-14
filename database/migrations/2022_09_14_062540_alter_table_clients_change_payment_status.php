<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientsChangePaymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('payment_status')->default(1)->comment('0:Paid,1:Not Paid,2:Pending')->change();
            $table->string('designation',100)->after('user_id')->nullable();
            $table->integer('plan_type')->after('address')->nullable();
            $table->integer('plan_id')->after('plan_type')->nullable();
            $table->string('remarks',300)->after('plan_id')->nullable();
            $table->bigInteger('amount_collected')->after('remarks')->nullable();
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
            $table->dropColumn('designation');
            $table->dropColumn('plan_type');
            $table->dropColumn('plan_id');
            $table->dropColumn('remarks');
            $table->dropColumn('amount_collected');
            $table->dropColumn('payment_status');
        });
    }
}
