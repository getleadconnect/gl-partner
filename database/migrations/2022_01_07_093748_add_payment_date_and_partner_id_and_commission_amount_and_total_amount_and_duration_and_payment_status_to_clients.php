<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentDateAndPartnerIdAndCommissionAmountAndTotalAmountAndDurationAndPaymentStatusToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->timestamp('payment_date')->nullable();
            $table->bigInteger('partner_id')->nullable();
            $table->double('commission_amount')->nullable();
            $table->double('total_amount')->nullable();
            $table->integer('duration');
            $table->boolean('payment_status')->default(0)->comment('0:Paid,1:Not Paid,2:Pending');
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
            $table->dropColumn('payment_date');
            $table->dropColumn('partner_id');
            $table->dropColumn('commission_amount');
            $table->dropColumn('total_amount');
            $table->dropColumn('duration');
            $table->dropColumn('payment_status');
        });
    }
}
